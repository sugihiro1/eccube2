<?php

/* Block/logo.twig */
class __TwigTemplate_fe1d19476e34cac436e2edd30e9130ec89ae533472661453f2e21dac4c6169e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 22
        echo "             <div class=\"header_logo_area\">
                <p class=\"copy\">くらしを楽しむライフスタイルグッズ</p>
                <h1 class=\"header_logo\"><a href=\"";
        // line 24
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "</a></h1>
            </div>
";
    }

    public function getTemplateName()
    {
        return "Block/logo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 24,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/logo.twig", "C:\\xampp\\htdocs\\eccube2\\src\\Eccube\\Resource\\template\\default\\Block\\logo.twig");
    }
}
