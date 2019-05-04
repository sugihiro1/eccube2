<?php

/* __string_template__7643dc4e6178e66e462eb5612181b0154877c7d6b4de50af636d8692af3186ce */
class __TwigTemplate_59ced4778afaca205f1888d2dbeae503a5be275e75045562860d643137fd8237 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__7643dc4e6178e66e462eb5612181b0154877c7d6b4de50af636d8692af3186ce", 22);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 24
        $context["body_class"] = "registration_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "    <h1 class=\"page-heading\">新規会員登録確認</h1>
    <div id=\"confirm_wrap\" class=\"container-fluid\">
        <div id=\"confirm_box\" class=\"row\">
            <div id=\"confirm_box__body\" class=\"col-md-10 col-md-offset-1\">
                <p id=\"confirm_box__message\">下記の内容で送信してもよろしいでしょうか？<br/>よろしければ、一番下の「会員登録をする」ボタンをクリックしてください。</p>

                <form method=\"post\" action=\"";
        // line 33
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("entry");
        echo "\">
                    ";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
                    <div id=\"confirm_box__body_inner\" class=\"dl_table\">
                        <dl id=\"confirm_box__name\">
                            <dt>";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "name", array()), 'label');
        echo "</dt>
                            <dd class=\"form-group input_name\">
                                ";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name01", array()), 'widget', array("attr" => array("placeholder" => "姓")));
        echo "
                                ";
        // line 40
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name02", array()), 'widget', array("attr" => array("placeholder" => "名")));
        echo "
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__kana\">
                            <dt>";
        // line 44
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana", array()), 'label');
        echo "</dt>
                            <dd class=\"form-group input_name\">
                                ";
        // line 46
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana01", array()), 'widget', array("attr" => array("placeholder" => "セイ")));
        echo "
                                ";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana02", array()), 'widget', array("attr" => array("placeholder" => "メイ")));
        echo "
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__company_name\">
                            <dt>";
        // line 51
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'label');
        echo "</dt>
                            <dd class=\"form-group input_name\">
                                ";
        // line 53
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'widget');
        echo "
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__address_detail\">
                            <dt>";
        // line 57
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'label');
        echo "</dt>
                            <dd>
                                <div id=\"confirm_box__zip\" class=\"form-group form-inline input_zip ";
        // line 59
        if (( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip01", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip02", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "zip", array()), 'widget');
        echo "</div>
                                <div id=\"confirm_box__address\" class=\"";
        // line 60
        if ((( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "pref", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr01", array()), "vars", array()), "errors", array()))) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr02", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">
                                    ";
        // line 61
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'widget');
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__tel\">
                            <dt>";
        // line 66
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-inline form-group input_tel\">
                                    ";
        // line 69
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'widget', array("attr" => array("class" => "short")));
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__fax\">
                            <dt>";
        // line 74
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-inline form-group input_tel\">
                                    ";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'widget', array("attr" => array("class" => "short")));
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__email\">
                            <dt>";
        // line 82
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "email", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-group\">
                                    ";
        // line 85
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "email", array()), "first", array()), 'widget');
        echo "
                                    ";
        // line 86
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "email", array()), "second", array()), 'widget', array("freeze_display_text" => false));
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__password\">
                            <dt>";
        // line 91
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "password", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-group\">
                                    ********
                                    ";
        // line 95
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "first", array()), 'widget', array("freeze_display_text" => false));
        echo "
                                    ";
        // line 96
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "second", array()), 'widget', array("freeze_display_text" => false));
        echo "
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <div class=\"dl_table not_required\">
                        <dl id=\"confirm_box__birth\">
                            <dt>";
        // line 103
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-group form-inline\">
                                    ";
        // line 106
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'widget');
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__sex\">
                            <dt>";
        // line 111
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-group form-inline\">
                                    ";
        // line 114
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'widget');
        echo "
                                </div>
                            </dd>
                        </dl>
                        <dl id=\"confirm_box__job\">
                            <dt>";
        // line 119
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'label');
        echo "</dt>
                            <dd>
                                <div class=\"form-group form-inline\">
                                    ";
        // line 122
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'widget');
        echo "
                                </div>
                            </dd>
                        </dl>
                    </div>

                    <div id=\"confirm_box__footer\" class=\"row no-padding\">
                        <div id=\"confirm_box__button_menu\" class=\"btn_group col-sm-offset-4 col-sm-4\">
                            <p id=\"confirm_box__insert_button\">
                                <button type=\"submit\" class=\"btn btn-primary btn-block\" name=\"mode\" value=\"complete\">
                                    会員登録をする
                                </button>
                            </p>
                            <p id=\"confirm_box__back_button\">
                                <button type=\"submit\" class=\"btn btn-info btn-block\" name=\"mode\" value=\"back\">戻る
                                </button>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__7643dc4e6178e66e462eb5612181b0154877c7d6b4de50af636d8692af3186ce";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 122,  218 => 119,  210 => 114,  204 => 111,  196 => 106,  190 => 103,  180 => 96,  176 => 95,  169 => 91,  161 => 86,  157 => 85,  151 => 82,  143 => 77,  137 => 74,  129 => 69,  123 => 66,  115 => 61,  109 => 60,  101 => 59,  96 => 57,  89 => 53,  84 => 51,  77 => 47,  73 => 46,  68 => 44,  61 => 40,  57 => 39,  52 => 37,  46 => 34,  42 => 33,  34 => 27,  31 => 26,  27 => 22,  25 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__7643dc4e6178e66e462eb5612181b0154877c7d6b4de50af636d8692af3186ce", "");
    }
}
