<?php

/* product/create.twig */
class __TwigTemplate_8eb40ef5dfae5d5898518c388ec44a1e2cef5b0c537f324f9aa962c812e3baa1 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layouts/main.twig", "product/create.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'meta_description' => array($this, 'block_meta_description'),
            'meta_keywords' => array($this, 'block_meta_keywords'),
            'pageTitle' => array($this, 'block_pageTitle'),
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
        $this->displayParentBlock("title", $context, $blocks);
        echo " - Create ";
    }

    // line 4
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 6
    public function block_pageTitle($context, array $blocks = array())
    {
        echo "  ";
    }

    // line 8
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 9
        echo "    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("home"), "html", null, true);
        echo "\">Home</a></li>
    <li><a href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("products"), "html", null, true);
        echo "\">Products</a></li>
    <li class=\"active\">Create Product</li>
";
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "    <div class=\"card\">
        <div class=\"card-header\">
            <strong>Create Product</strong>
        </div>
        <div class=\"card-body card-block\">
            <form action=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("product_create"), "html", null, true);
        echo "\" method=\"post\" class=\"form-horizontal\">

                <div class=\"row form-group\">
                    <div class=\"col col-md-3\">
                        <label for=\"product-name\" class=\" form-control-label\" >Name</label>
                    </div>
                    <div class=\"col-12 col-md-9\">
                        <input id=\"product-name\" name=\"product-name\"
                               placeholder=\"Enter product name...\" class=\"form-control\" type=\"text\" required>
                        <span class=\"help-block\">Please enter product name</span>
                    </div>
                </div>

                <div class=\"row form-group\">
                    <div class=\"col col-md-3\">
                        <label for=\"product-default-price\" class=\" form-control-label\" required>Default Price</label>
                    </div>
                    <div class=\"col-12 col-md-9\">
                        <input id=\"product-default-price\" name=\"product-default-price\" placeholder=\"Enter default price...\" class=\"form-control\" type=\"number\">
                        <span class=\"help-block\">Please enter default price</span>
                    </div>
                </div>

                <div class=\"row form-group\">
                    <div class=\"col col-md-3\">
                        <label for=\"product-discount\" class=\" form-control-label\">Discount</label>
                    </div>
                    <div class=\"col-12 col-md-9\">
                        <input id=\"product-discount\" name=\"product-discount\" placeholder=\"Enter discount...\" class=\"form-control\" type=\"number\">
                        <span class=\"help-block\">Please enter discount</span>
                    </div>
                </div>


                <div class=\"card\">
                    <div class=\"card-header\">
                        <strong class=\"card-title\">Additional Prices</strong>
                    </div>
                    <div class=\"card-body\">
                        <table class=\"table\">
                            <thead class=\"thead-dark\">
                            <tr>
                                <th scope=\"col\">Value</th>
                                <th scope=\"col\">Start Date</th>
                                <th scope=\"col\">Expiration Date</th>
                                <th scope=\"col\">Actions</th>
                            </tr>
                            </thead>
                            <tbody id=\"add-price-tbody\">
                            <tr class=\"price-tr\" hidden>
                                <td>
                                    <input name=\"price[value][]\" class=\"form-control\" type=\"number\">
                                </td>
                                <td>
                                    <input name=\"price[start-date][]\" class=\"form-control\" type=\"date\">
                                </td>
                                <td>
                                    <input name=\"price[expiration-date][]\" class=\"form-control\" type=\"date\">
                                </td>
                                <td>
                                    <a href=\"#\" class=\"delete-add-price\"><i class=\"fa fa-trash\"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <a id=\"add-price\" href=\"#\"><i class=\"fa fa-plus fa-2x\"></i> </a>
                    </div>
                </div>

                <div class=\"card-footer\">
                    <button type=\"submit\" class=\"btn btn-primary btn-sm\">
                        <i class=\"fa fa-dot-circle-o\"></i> Submit
                    </button>
                    <button type=\"reset\" class=\"btn btn-danger btn-sm\">
                        <i class=\"fa fa-ban\"></i> Reset
                    </button>
                </div>
            </form>
        </div>

    </div>





";
    }

    public function getTemplateName()
    {
        return "product/create.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 21,  78 => 16,  75 => 15,  68 => 10,  63 => 9,  60 => 8,  54 => 6,  49 => 5,  44 => 4,  37 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "product/create.twig", "/var/www/html/madison/Views/product/create.twig");
    }
}
