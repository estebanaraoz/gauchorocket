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

/* saludo.html.twig */
class __TwigTemplate_6f00a0af7531a65256cdd6f56fe13fecca4243e3eb3de5f8e9eef292801e0c76 extends \Twig\Template
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
 \tHola!
</div>
</body>";
    }

    public function getTemplateName()
    {
        return "saludo.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
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
 \tHola!
</div>
</body>", "saludo.html.twig", "C:\\personal\\htdocs\\pw2\\practica\\framky\\views\\saludo.html.twig");
    }
}
