<?php

/* partials/header.twig */
class __TwigTemplate_de2868c8bdc2f86261e40e92b6773312be06de060f342c7de74292a754f1b1a6 extends Twig_Template
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
        echo "<header id=\"header\" class=\"header\">

    <div class=\"header-menu\">

            <div class=\"col-sm-7\">
                <a id=\"menuToggle\" class=\"menutoggle pull-left\"><i class=\"fa fa fa-tasks\"></i></a>
            </div>

            <div class=\"col-sm-5\">
                <div class=\"user-area dropdown float-right\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                        <i class=\"fa fa-user fa-2x\"></i>
                    </a>

                    <div class=\"user-menu dropdown-menu\">
                        <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-user \"></i>My Profile</a>

                        <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-user\"></i>Notifications <span class=\"count\">13</span></a>

                        <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-cog\"></i>Settings</a>

                        <a class=\"nav-link\" href=\"#\"><i class=\"fa fa-power-off\"></i>Logout</a>
                    </div>
                </div>

            </div>
        </div>


</header>";
    }

    public function getTemplateName()
    {
        return "partials/header.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/header.twig", "/var/www/html/madison/Views/partials/header.twig");
    }
}
