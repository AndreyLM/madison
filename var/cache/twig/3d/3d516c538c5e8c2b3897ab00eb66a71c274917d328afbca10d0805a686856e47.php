<?php

/* partials/footer.twig */
class __TwigTemplate_ef80d4f3ff22069d099e8297146fef257147d8b6baf2f21e837c47897596a5cb extends Twig_Template
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/vendor/jquery-2.1.4.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/plugins.js\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/main.js\"></script>


<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/lib/chart-js/Chart.bundle.js\"></script>
<script src=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/dashboard.js\"></script>
<script src=\"";
        // line 9
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/widgets.js\"></script>
<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/lib/vector-map/jquery.vmap.js\"></script>
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/lib/vector-map/jquery.vmap.min.js\"></script>
<script src=\"";
        // line 12
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/lib/vector-map/jquery.vmap.sampledata.js\"></script>
<script src=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["baseUrl"] ?? null), "html", null, true);
        echo "/src/assets/js/lib/vector-map/country/jquery.vmap.world.js\"></script>
<script>
    ( function ( \$ ) {
        \"use strict\";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>";
    }

    public function getTemplateName()
    {
        return "partials/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 13,  59 => 12,  55 => 11,  51 => 10,  47 => 9,  43 => 8,  39 => 7,  33 => 4,  29 => 3,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "partials/footer.twig", "/var/www/html/madison/Views/partials/footer.twig");
    }
}
