<?php

/* error/404.twig */
class __TwigTemplate_24f467dda6ae626cdf3a1d91785c663a18349acdd232b3249304812c98663320 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layouts/main.twig", "error/404.twig", 1);
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
        echo "404 - Not found";
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
        echo "    <h1>404 - Not Found</h1>
";
    }

    public function getTemplateName()
    {
        return "error/404.twig";
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
        return new Twig_Source("", "error/404.twig", "/var/www/html/madison/Views/error/404.twig");
    }
}
