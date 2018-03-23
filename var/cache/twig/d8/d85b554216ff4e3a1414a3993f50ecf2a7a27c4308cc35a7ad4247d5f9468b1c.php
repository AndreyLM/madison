<?php

/* partials/leftpanel.twig */
class __TwigTemplate_2effaf3b470c61f524274524e4c3eb8ab572db850e46ff8049a3b19919ea54f2 extends Twig_Template
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
        echo "<aside id=\"left-panel\" class=\"left-panel\">
    <nav class=\"navbar navbar-expand-sm navbar-default\">

        <div class=\"navbar-header\">
            <button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-menu\" aria-controls=\"main-menu\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <i class=\"fa fa-bars\"></i>
            </button>
            <a class=\"navbar-brand\" href=\"./\"><h3>MADISON</h3></a>
            <a class=\"navbar-brand hidden\" href=\"./\"><h5>MADISON</h5></a>
        </div>

        <div id=\"main-menu\" class=\"main-menu collapse navbar-collapse\">
            <ul class=\"nav navbar-nav\">
                <h3 class=\"menu-title\">Content Management System</h3><!-- /.menu-title -->
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-product-hunt\"></i>Products</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-table\"></i><a href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("products"), "html", null, true);
        echo "\">View all</a></li>
                        <li><i class=\"fa fa-plus\"></i><a href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("product_create"), "html", null, true);
        echo "\">Create</a></li>
                    </ul>
                </li>
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"menu-icon fa fa-file-text\"></i>Articles</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"fa fa-table\"></i><a href=\"#\">View all</a></li>
                        <li><i class=\"fa fa-plus\"></i><a href=\"#\">Create</a></li>
                    </ul>
                </li>


                <h3 class=\"menu-title\"><i class=\"fa fa-cogs\"></i> Settings</h3><!-- /.menu-title -->
                <li class=\"menu-item-has-children dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"fa fa-user\"></i> User</a>
                    <ul class=\"sub-menu children dropdown-menu\">
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"#\"><i class=\"fa fa-user \"></i>My Profile</a></li>
                        <li><i class=\"menu-icon fa fa-sign-in\"></i><a href=\"#\"><i class=\"fa fa-user\"></i>Notifications <span class=\"count\">13</span></a></li>
                        <li><i class=\"menu-icon fa fa-paper-plane\"></i><a href=\"#\"><i class=\"fa fa-cog\"></i>Settings</a></li>
                        <li><i class=\"menu-icon fa fa-paper-plane\"></i><a href=\"#\"><i class=\"fa fa-cog\"></i><i class=\"fa fa-power-off\"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>";
    }

    public function getTemplateName()
    {
        return "partials/leftpanel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 19,  42 => 18,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/leftpanel.twig", "/var/www/html/madison/Views/partials/leftpanel.twig");
    }
}
