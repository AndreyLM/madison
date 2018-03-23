<?php

/* product/view.twig */
class __TwigTemplate_be0a79fe3ba3b9552392cfd906919cd2f7be4c0802b9ff2fd5fa27363a3f59a4 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("layouts/main.twig", "product/view.twig", 1);
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
        echo " - ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", array()), "html", null, true);
        echo " ";
    }

    // line 4
    public function block_meta_description($context, array $blocks = array())
    {
    }

    // line 5
    public function block_meta_keywords($context, array $blocks = array())
    {
    }

    // line 8
    public function block_pageTitle($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", array()), "html", null, true);
        echo " ";
    }

    // line 10
    public function block_breadcrumbs($context, array $blocks = array())
    {
        // line 11
        echo "    <li><a href=\"";
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("home"), "html", null, true);
        echo "\">Home</a></li>
    <li><a href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("products"), "html", null, true);
        echo "\">Products</a></li>
    <li class=\"active\">";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", array()), "html", null, true);
        echo "</li>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "        <div class=\"row\">
            <div class=\"col-sm-12\">
                <a class=\"btn btn-danger btn-\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("product_delete", array("id" => twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", array()))), "html", null, true);
        echo "\">Delete</a>
                <a class=\"btn btn-info\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['App\Template\Twig\TwigRouteExtension']->generatePath("product_update", array("id" => twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", array()))), "html", null, true);
        echo "\">Update</a>
            </div>
        </div>
    <hr>
      <div class=\"row\">
          <div class=\"col-sm-3\"><p>ID:</p></div>
          <div class=\"col-sm-9\">";
        // line 27
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "id", array()), "html", null, true);
        echo "</div>
      </div>
      <div class=\"row\">
          <div class=\"col-sm-3\"><p>Name:</p></div>
          <div class=\"col-sm-9\">";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "name", array()), "html", null, true);
        echo "</div>
      </div>
      <div class=\"row\">
          <div class=\"col-sm-3\"><p>Default price:</p></div>
          <div class=\"col-sm-9\">";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "defaultPrice", array()), "html", null, true);
        echo " UAH</div>
      </div>
      <div class=\"row\">
          <div class=\"col-sm-3\"><p>Discount:</p></div>
          <div class=\"col-sm-9\">";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "discount", array()), "html", null, true);
        echo "%</div>
      </div>
      <div class=\"row\">
          <div class=\"col-sm-3\"><p>Current price:</p></div>
          <div class=\"col-sm-9\">";
        // line 43
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "getCurrentPrice", array(), "method"), "html", null, true);
        echo " UAH</div>
      </div>

      <div class=\"row\">
          <div class=\"col-sm-3\"><p>Price with discount:</p></div>
          <div class=\"col-sm-9\">";
        // line 48
        echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "getCurrentPrice", array(), "method") * (1 - (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "discount", array()) / 100))), "html", null, true);
        echo " UAH</div>
      </div>

    <div class=\"card\">
        <div class=\"card-header\">
            <strong class=\"card-title\">Additional Prices</strong>
        </div>
        <div class=\"card-body\">
            <table class=\"table table-striped\">
                <thead>
                <tr>
                    <th scope=\"col\">Value</th>
                    <th scope=\"col\">Start Date</th>
                    <th scope=\"col\">Expiration Date</th>
                </tr>
                </thead>
                <tbody>
                ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "getAdditionalPrices", array(), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["price"]) {
            // line 66
            echo "                <tr>
                    <td>";
            // line 67
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["price"], "value", array()), "html", null, true);
            echo " UAH</td>
                    <td>";
            // line 68
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["price"], "startDate", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                    <td>";
            // line 69
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["price"], "expirationDate", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['price'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 72
        echo "                </tbody>
            </table>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "product/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 72,  173 => 69,  169 => 68,  165 => 67,  162 => 66,  158 => 65,  138 => 48,  130 => 43,  123 => 39,  116 => 35,  109 => 31,  102 => 27,  93 => 21,  89 => 20,  85 => 18,  82 => 17,  76 => 13,  72 => 12,  67 => 11,  64 => 10,  56 => 8,  51 => 5,  46 => 4,  37 => 3,  15 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "product/view.twig", "/var/www/html/madison/Views/product/view.twig");
    }
}
