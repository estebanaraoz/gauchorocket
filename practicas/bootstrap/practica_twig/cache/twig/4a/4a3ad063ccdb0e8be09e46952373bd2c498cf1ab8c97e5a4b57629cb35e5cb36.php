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
class __TwigTemplate_6df53c658d0387eb4e291be522115d1880cd3928eb46de94e63aca21fc8b4c43 extends \Twig\Template
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
        echo "<body>
  <div class=\"jumbotron text-center\">
    <h1>Mi primer bootstrap con twig</h1>
  </div>
  <div class=\"container\">
    Hola!
  </div>
</body>
";
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
        return new Source("", "saludo.html.twig", "/opt/lampp/htdocs/bootstrap/practica_twig/views/saludo.html.twig");
    }
}
