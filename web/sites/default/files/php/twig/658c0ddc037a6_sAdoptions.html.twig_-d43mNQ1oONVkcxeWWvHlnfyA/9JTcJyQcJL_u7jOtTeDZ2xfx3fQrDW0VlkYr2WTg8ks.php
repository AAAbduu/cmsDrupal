<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/sAdoptions/templates/sAdoptions.html.twig */
class __TwigTemplate_c958b902e48e103b67751b23e06d7d3d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "

<div class=\"adoptions\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["adoption"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["adopt"]) {
            // line 5
            echo "        <div class=\"adoption-node\">
            <h2>";
            // line 6
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["adopt"], "title", [], "any", false, false, true, 6), "value", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "</h2>
           ";
            // line 7
            $context["image_url"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getFileUrl($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_compile_0 = twig_get_attribute($this->env, $this->source, $context["adopt"], "field_pet_images", [], "any", false, false, true, 7)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "entity", [], "any", false, false, true, 7), "uri", [], "any", false, false, true, 7), "value", [], "any", false, false, true, 7), 7, $this->source));
            // line 8
            echo "            
            <!-- Añadir enlace a la imagen -->
            <a href=\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.node.canonical", ["node" => twig_get_attribute($this->env, $this->source, $context["adopt"], "id", [], "any", false, false, true, 10)]), "html", null, true);
            echo "\">
                <img src=\"";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["image_url"] ?? null), 11, $this->source), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["img"] ?? null), "alt", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "\">
            </a>
            ";
            // line 14
            echo "            <p>Pet adopted: ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["adopt"], "field_pet_you_adopt", [], "any", false, false, true, 14), "entity", [], "any", false, false, true, 14), "label", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "</p>
            <p>Pet Age: ";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["adopt"], "field_pet_age", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</p>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adopt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "modules/custom/sAdoptions/templates/sAdoptions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 18,  77 => 15,  72 => 14,  65 => 11,  61 => 10,  57 => 8,  55 => 7,  51 => 6,  48 => 5,  44 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/sAdoptions/templates/sAdoptions.html.twig", "/Applications/MAMP/htdocs/finalAssignment/web/modules/custom/sAdoptions/templates/sAdoptions.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 4, "set" => 7);
        static $filters = array("escape" => 6);
        static $functions = array("file_url" => 7, "path" => 10);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set'],
                ['escape'],
                ['file_url', 'path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
