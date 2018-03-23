<?php

/* partials/head.twig */
class __TwigTemplate_fa69b526e3129ae4fb83cf00cb6a3f0e7b1ebf0cc5ccc1812c6e40bb20295fb6 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<link rel=\"apple-touch-icon\" href=\"apple-icon.png\">
<link rel=\"shortcut icon\" href=\"src/favicon.ico\">

<link rel=\"stylesheet\" href=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/normalize.css\">
<link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/bootstrap.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/font-awesome.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/themify-icons.css\">
<link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/flag-icon.min.css\">
<link rel=\"stylesheet\" href=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/css/cs-skin-elastic.css\">
<!-- <link rel=\"stylesheet\" href=\"src/assets/css/bootstrap-select.less\"> -->
<link rel=\"stylesheet\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/scss/style.css\">
<link href=\"src/assets/css/lib/vector-map/jqvmap.min.css\" rel=\"stylesheet\">

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

<!-- <script type=\"text/javascript\" src=\"https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js\"></script> -->";
    }

    public function getTemplateName()
    {
        return "partials/head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 11,  48 => 9,  44 => 8,  40 => 7,  36 => 6,  32 => 5,  28 => 4,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/head.twig", "/var/www/html/madison/Views/partials/head.twig");
    }
}
