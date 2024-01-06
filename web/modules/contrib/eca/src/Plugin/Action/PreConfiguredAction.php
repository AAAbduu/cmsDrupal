<?php

namespace Drupal\eca\Plugin\Action;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Session\AccountInterface;

/**
 * Wrapper action for all pre-configured actions.
 *
 * @Action(
 *   id = "eca_preconfigured_action",
 *   deriver = "\Drupal\eca\Plugin\Action\PreConfiguredActionDeriver",
 *   nodocs = true
 * )
 */
class PreConfiguredAction extends ConfigurableActionBase {

  /**
   * {@inheritdoc}
   */
  public function access($object, AccountInterface $account = NULL, $return_as_object = FALSE) {
    $access = AccessResult::forbidden();
    $id = $this->getPluginDefinition()['action_entity_id'];
    /** @var \Drupal\system\Entity\Action $action */
    if ($action = $this->entityTypeManager->getStorage('action')->load($id)) {
      $access = $action->getPlugin()->access($object, $account, TRUE);
    }
    return $return_as_object ? $access : $access->isAllowed();
  }

  /**
   * {@inheritdoc}
   */
  public function execute($object = NULL): void {
    $id = $this->getPluginDefinition()['action_entity_id'];
    /** @var \Drupal\system\Entity\Action $action */
    if ($action = $this->entityTypeManager->getStorage('action')->load($id)) {
      $action->execute([$object]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function calculateDependencies(): array {
    $dependencies = parent::calculateDependencies();
    $id = $this->getPluginDefinition()['action_entity_id'];
    /** @var \Drupal\system\Entity\Action $action */
    if ($action = $this->entityTypeManager->getStorage('action')->load($id)) {
      $dependencies[$action->getConfigDependencyKey()][] = $action->getConfigDependencyName();
    }
    return $dependencies;
  }

}
