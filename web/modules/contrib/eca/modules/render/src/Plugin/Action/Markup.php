<?php

namespace Drupal\eca_render\Plugin\Action;

use Drupal\Core\Render\BubbleableMetadata;
use Drupal\Core\Render\Markup as RenderMarkup;
use Drupal\Core\Render\RenderContext;
use Drupal\Core\Render\RendererInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\eca\Plugin\Action\ActionBase;
use Symfony\Component\Yaml\Exception\ParseException;

/**
 * Renders markup using a specified render array.
 *
 * @Action(
 *   id = "eca_render_markup",
 *   label = @Translation("Render: markup"),
 *   description = @Translation("Renders markup using a specified render array.")
 * )
 */
class Markup extends Build {

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected RendererInterface $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): ActionBase {
    /** @var \Drupal\eca_render\Plugin\Action\Markup $instance */
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * {@inheritdoc}
   */
  protected function doBuild(array &$build): void {
    $value = $this->configuration['value'];

    if ($this->configuration['use_yaml']) {
      try {
        $value = $this->yamlParser->parse($value);
      }
      catch (ParseException $e) {
        \Drupal::logger('eca')->error('Tried parsing a state value item in action "eca_render_markup" as YAML format, but parsing failed.');
        return;
      }
    }
    else {
      $value = $this->tokenServices->getOrReplace($value);
    }

    $this->doBuildRecursive($build, $value);

    $markup = $this->renderer->executeInRenderContext(new RenderContext(), function () use (&$build) {
      return $this->renderer->render($build);
    });
    $metadata = BubbleableMetadata::createFromRenderArray($build);
    $build = ['#markup' => RenderMarkup::create($markup)];
    $metadata->applyTo($build);
  }

}
