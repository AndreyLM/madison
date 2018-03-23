<?php

/* layouts/main.twig */
class __TwigTemplate_fcf0e7e6e0a52911b07d5ffa99987d84bf6ece393863eb9988cb71a3c36a5474 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'title' => array($this, 'block_title'),
            'head_links' => array($this, 'block_head_links'),
            'pageTitle' => array($this, 'block_pageTitle'),
            'breadcrumbs' => array($this, 'block_breadcrumbs'),
            'content' => array($this, 'block_content'),
            'scripts' => array($this, 'block_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<!--[if lt IE 7]>      <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"\"> <![endif]-->
<!--[if IE 7]>         <html class=\"no-js lt-ie9 lt-ie8\" lang=\"\"> <![endif]-->
<!--[if IE 8]>         <html class=\"no-js lt-ie9\" lang=\"\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"\"> <!--<![endif]-->
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <meta name=\"description\" content=\"";
        // line 10
        $this->displayBlock('meta_description', $context, $blocks);
        echo "\">
    <meta name=\"keywords\" content=\"";
        // line 11
        $this->displayBlock('meta_keywords', $context, $blocks);
        echo "\">
    ";
        // line 12
        $this->loadTemplate("partials/head.twig", "layouts/main.twig", 12)->display($context);
        // line 13
        echo "    <title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 14
        $this->displayBlock('head_links', $context, $blocks);
        // line 15
        echo "</head>
<body>
    ";
        // line 17
        $this->loadTemplate("partials/leftpanel.twig", "layouts/main.twig", 17)->display($context);
        // line 18
        echo "
    <div id=\"right-panel\" class=\"right-panel\">
        ";
        // line 20
        $this->loadTemplate("partials/header.twig", "layouts/main.twig", 20)->display($context);
        // line 21
        echo "        <div class=\"content mt-3\">
            <div class=\"breadcrumbs\">
                <div class=\"col-sm-4\">
                    <div class=\"page-header float-left\">
                        <div class=\"page-title\">
                            ";
        // line 26
        $this->displayBlock('pageTitle', $context, $blocks);
        // line 27
        echo "                        </div>
                    </div>
                </div>
                <div class=\"col-sm-8\">
                    <div class=\"page-header float-right\">
                        <div class=\"page-title\">
                            <ol class=\"breadcrumb text-right\">
                                ";
        // line 34
        $this->displayBlock('breadcrumbs', $context, $blocks);
        // line 37
        echo "                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            ";
        // line 42
        $this->displayBlock('content', $context, $blocks);
        // line 43
        echo "        </div>
    </div>

    ";
        // line 46
        $this->loadTemplate("partials/footer.twig", "layouts/main.twig", 46)->display($context);
        // line 47
        echo "
    ";
        // line 48
        $this->displayBlock('scripts', $context, $blocks);
        // line 49
        echo "</body>
</html>
";
    }

    // line 10
    public function block_meta_description($context, array $blocks = array())
    {
        echo "MADISON";
    }

    // line 11
    public function block_meta_keywords($context, array $blocks = array())
    {
        echo "MADISON";
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "MADISON";
    }

    // line 14
    public function block_head_links($context, array $blocks = array())
    {
    }

    // line 26
    public function block_pageTitle($context, array $blocks = array())
    {
        echo "Home";
    }

    // line 34
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 35
        echo "                                    <li class=\"active\">Madison</li>
                                ";
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
    }

    // line 48
    public function block_scripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/main.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 48,  155 => 42,  150 => 35,  147 => 34,  141 => 26,  136 => 14,  130 => 13,  124 => 11,  118 => 10,  112 => 49,  110 => 48,  107 => 47,  105 => 46,  100 => 43,  98 => 42,  91 => 37,  89 => 34,  80 => 27,  78 => 26,  71 => 21,  69 => 20,  65 => 18,  63 => 17,  59 => 15,  57 => 14,  52 => 13,  50 => 12,  46 => 11,  42 => 10,  31 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "layouts/main.twig", "/var/www/html/madison/Views/layouts/main.twig");
    }
}
