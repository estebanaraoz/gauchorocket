<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* saludo1.html.twig */
class __TwigTemplate_37056688ba4d6f6779fc123c7fac0e06a681f2804f09879053ca6687dbe08461 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "
<body>
<div class = \"jumbotron text-center\">
   <h1> Mi primera página de Bootstrap junto a twig</h1>
</div>

<div class=\"container\">
 \tHola! ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["nombre"]) ? $context["nombre"] : null), "html", null, true);
        echo " 
</div>
</body>";
    }

    public function getTemplateName()
    {
        return "saludo1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("
<body>
<div class = \"jumbotron text-center\">
   <h1> Mi primera página de Bootstrap junto a twig</h1>
</div>

<div class=\"container\">
 \tHola! {{ nombre }} 
</div>
</body>", "saludo1.html.twig", "C:\\personal\\htdocs\\pw2\\practica\\framky\\views\\saludo1.html.twig");
    }
}
