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

/* saludo2.html.twig */
class __TwigTemplate_0002101e3cd8d5e2afd8f1bc07325b695045a757cceb45ea71a5d49464b76aac extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'contenido' => [$this, 'block_contenido'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->displayBlock('contenido', $context, $blocks);
    }

    public function block_contenido($context, array $blocks = [])
    {
        // line 2
        echo "  <h1>";
        echo twig_escape_filter($this->env, (isset($context["titulo_pagina"]) ? $context["titulo_pagina"] : null), "html", null, true);
        echo "</h1>
  <div>Hola ";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["nombre"]) ? $context["nombre"] : null), "html", null, true);
        echo ", bienvenido a mi web.</div>
";
    }

    public function getTemplateName()
    {
        return "saludo2.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  42 => 3,  37 => 2,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% block contenido %}
  <h1>{{ titulo_pagina }}</h1>
  <div>Hola {{ nombre }}, bienvenido a mi web.</div>
{% endblock %}
", "saludo2.html.twig", "C:\\personal\\htdocs\\pw2\\practica\\framky\\views\\saludo2.html.twig");
    }
}
