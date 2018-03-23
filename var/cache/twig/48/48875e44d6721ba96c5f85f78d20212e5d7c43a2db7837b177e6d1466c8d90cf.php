<?php

/* error/error.twig */
class __TwigTemplate_2ab150b372d89850e5c476b15241982c5a7b2e515bf4bfc5f4a33ff054ad6c72 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layouts/main.twig", "error/error.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/main.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "500 - Server error";
    }

    // line 5
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 6
        echo "    <ul class=\"breadcrumb\">
        <li><a href=\"/\">Home</a></li>
        <li class=\"active\">Error</li>
    </ul>
";
    }

    // line 12
    public function block_content($context, array $blocks = array())
    {
        // line 13
        echo "    <h1>500 - Server error</h1>
";
    }

    public function getTemplateName()
    {
        return "error/error.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 13,  51 => 12,  43 => 6,  40 => 5,  34 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "error/error.twig", "/var/www/html/madison/Views/error/error.twig");
    }
}
