<?php

/* __string_template__d7582be3ec24b1744f4cc2092d4c1c8902fb689eadd2912177a42d80af87e54b */
class __TwigTemplate_4832eb85e784c7c4ece3395eab63b2850a433d42dbd5f885ab90cf0f4553cacf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__d7582be3ec24b1744f4cc2092d4c1c8902fb689eadd2912177a42d80af87e54b", 25);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'javascript' => array($this, 'block_javascript'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 27
        $context["menus"] = array(0 => "customer", 1 => "customer_edit");
        // line 32
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 29
    public function block_title($context, array $blocks = array())
    {
        echo "会員管理";
    }

    // line 30
    public function block_sub_title($context, array $blocks = array())
    {
        echo "会員登録・編集";
    }

    // line 34
    public function block_javascript($context, array $blocks = array())
    {
        // line 35
        echo "<script src=\"//ajaxzip3.github.io/ajaxzip3.js\" charset=\"UTF-8\"></script>
<script>
    \$(function() {
        \$('#zip-search').click(function() {
            AjaxZip3.zip2addr('admin_customer[zip][zip01]', 'admin_customer[zip][zip02]', 'admin_customer[address][pref]', 'admin_customer[address][addr01]');
        });
    });
</script>
";
    }

    // line 45
    public function block_main($context, array $blocks = array())
    {
        // line 46
        echo "<div class=\"row\" id=\"aside_wrap\">
    <form name=\"customer_form\" role=\"form\" id=\"customer_form\" method=\"post\" action=\"";
        // line 47
        if ($this->getAttribute(($context["Customer"] ?? null), "id", array())) {
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_customer_edit", array("id" => $this->getAttribute(($context["Customer"] ?? null), "id", array()))), "html", null, true);
        } else {
            echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_customer_new");
        }
        echo "\">
        ";
        // line 48
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
        <div id=\"detail_wrap\" class=\"col-md-9\">
            <div id=\"detail_box\" class=\"box accordion\">
                <div id=\"detail_box__header\" class=\"box-header toggle active\">
                    <h3 class=\"box-title\">会員情報<svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg></h3>
                </div><!-- /.box-header -->
                <div id=\"detail_box__body\" class=\"box-body accpanel\" style=\"display: block;\">
                    <div class=\"form-horizontal\">
                        ";
        // line 57
        echo "                        ";
        if ($this->getAttribute(($context["Customer"] ?? null), "id", array())) {
            // line 58
            echo "                        <div id=\"detail_box__id\" class=\"form-group\">
                            <label class=\"col-sm-3 col-lg-2 control-label\">会員ID</label>
                            <div class=\"col-sm-9 col-lg-10\">";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "id", array()), "html", null, true);
            echo "</div>
                        </div>
                        ";
        }
        // line 63
        echo "                        ";
        // line 64
        echo "                        <div id=\"detail_box__name\" class=\"form-group\">
                            ";
        // line 65
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "name", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10 input_name form-inline\">
                                ";
        // line 67
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name01", array()), 'widget');
        echo "
                                ";
        // line 68
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name02", array()), 'widget');
        echo "
                                ";
        // line 69
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name01", array()), 'errors');
        echo "
                                ";
        // line 70
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name02", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 74
        echo "                        <div id=\"detail_box__kana\" class=\"form-group\">
                            ";
        // line 75
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10 input_name form-inline\">
                                ";
        // line 77
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana01", array()), 'widget');
        echo "
                                ";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana02", array()), 'widget');
        echo "
                                ";
        // line 79
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana01", array()), 'errors');
        echo "
                                ";
        // line 80
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana02", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 84
        echo "                        <div id=\"detail_box__company_name\" class=\"form-group\">
                            ";
        // line 85
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 87
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'widget');
        echo "
                                ";
        // line 88
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 92
        echo "                        <div id=\"detail_box__address\" class=\"form-group\">
                            ";
        // line 93
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'label');
        echo "
                            <div id=\"detail_box__zip\" class=\"col-sm-9 col-lg-10 input_zip form-inline\">
                                〒";
        // line 95
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip01", array()), 'widget');
        echo "-";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip02", array()), 'widget');
        echo "
                                ";
        // line 96
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "zip", array()), 'errors');
        echo "
                                ";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip01", array()), 'errors');
        echo "
                                ";
        // line 98
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip02", array()), 'errors');
        echo "
                                <span><button type=\"button\" id=\"zip-search\" class=\"btn btn-default btn-sm\">郵便番号から自動入力</button></span>
                            </div>
                        </div>
                        ";
        // line 103
        echo "                        <div class=\"form-group\">
                            <div id=\"detail_box__pref\" class=\"col-sm-offset-2 col-sm-9 col-lg-10 form-inline\">
                                ";
        // line 105
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "pref", array()), 'widget');
        echo "
                                ";
        // line 106
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "pref", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 110
        echo "                        <div class=\"form-group\">
                            <div id=\"detail_box__addr01\" class=\"col-sm-offset-2 col-sm-9 col-lg-10\">
                                ";
        // line 112
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr01", array()), 'widget', array("attr" => array("placeholder" => "市区町村名（例：千代田区神田神保町）")));
        echo "
                                ";
        // line 113
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr01", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 117
        echo "                        <div class=\"form-group\">
                            <div id=\"detail_box__addr02\" class=\"col-sm-offset-2 col-sm-9 col-lg-10\">
                                ";
        // line 119
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr02", array()), 'widget', array("attr" => array("placeholder" => "番地・ビル名（例：1-3-5）")));
        echo "
                                ";
        // line 120
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr02", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 124
        echo "                        <div id=\"detail_box__email\" class=\"form-group\">
                            ";
        // line 125
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "email", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 127
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "email", array()), 'widget');
        echo "
                                ";
        // line 128
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "email", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 132
        echo "                        <div id=\"detail_box__tel\" class=\"form-group\">
                            ";
        // line 133
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10 input_tel form-inline\">
                                ";
        // line 135
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel01", array()), 'widget');
        echo "-";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel02", array()), 'widget');
        echo "-";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel03", array()), 'widget');
        echo "
                                ";
        // line 136
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel01", array()), 'errors');
        echo "
                                ";
        // line 137
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel02", array()), 'errors');
        echo "
                                ";
        // line 138
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel", array()), "tel03", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 142
        echo "                        <div id=\"detail_box__fox\" class=\"form-group\">
                            ";
        // line 143
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10 input_tel form-inline\">
                                ";
        // line 145
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax01", array()), 'widget');
        echo "-";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax02", array()), 'widget');
        echo "-";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax03", array()), 'widget');
        echo "
                                ";
        // line 146
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax01", array()), 'errors');
        echo "
                                ";
        // line 147
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax02", array()), 'errors');
        echo "
                                ";
        // line 148
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "fax", array()), "fax03", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 152
        echo "                        <div id=\"detail_box__password_first\" class=\"form-group\">
                            ";
        // line 153
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "first", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 155
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "first", array()), 'widget', array("type" => "password"));
        echo "
                                ";
        // line 156
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "first", array()), 'errors');
        echo "
                            </div>
                        </div>
                        <div id=\"detail_box__password_second\" class=\"form-group\">
                            ";
        // line 160
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "second", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 162
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "second", array()), 'widget', array("type" => "password"));
        echo "
                                ";
        // line 163
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "password", array()), "second", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 167
        echo "                        <div id=\"detail_box__sex\" class=\"form-group\">
                            ";
        // line 168
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 170
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'widget');
        echo "
                                ";
        // line 171
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 175
        echo "                        <div id=\"detail_box__job\" class=\"form-group\">
                            ";
        // line 176
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                ";
        // line 178
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'widget');
        echo "
                                ";
        // line 179
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'errors');
        echo "
                            </div>
                        </div>
                        ";
        // line 183
        echo "                        <div id=\"detail_box__birth\" class=\"form-group\">
                            ";
        // line 184
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10\">
                                <div class=\"form-inline\">
                                    ";
        // line 187
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'widget');
        echo "
                                    ";
        // line 188
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'errors');
        echo "
                                </div>
                            </div>
                        </div>
                        <div class=\"extra-form\">
                            ";
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "getIterator", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 194
            echo "                                ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 195
                echo "                                    ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                echo "
                                ";
            }
            // line 197
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 198
        echo "                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

            ";
        // line 203
        if ($this->getAttribute(($context["Customer"] ?? null), "id", array())) {
            // line 204
            echo "            <div id=\"history_box\" class=\"box accordion\">
                <div id=\"history_box__toggle\" class=\"box-header toggle\">
                    <h3 class=\"box-title\">購入履歴<svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg></h3>
                </div><!-- /.box-header -->
                <div id=\"history_box__body\" class=\"box-body accpanel\">
                    ";
            // line 209
            if ((twig_length_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "Orders", array())) > 0)) {
                // line 210
                echo "                    <div id=\"history_box__list\" class=\"table_list\">
                        <div class=\"table-responsive with-border\">
                            <table class=\"table table-striped\">
                                <thead>
                                    <tr id=\"history_box__list_header\">
                                        <th id=\"history_box__header_order_date\">注文日時</th>
                                        <th id=\"history_box__header_order_id\">受注番号</th>
                                        <th id=\"history_box__header_order_total\">購入金額</th>
                                        <th id=\"history_box__header_commit_date\">発送日</th>
                                        <th id=\"history_box__header_payment_method\">支払方法</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ";
                // line 223
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Customer"] ?? null), "Orders", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["Order"]) {
                    // line 224
                    echo "                                    <tr id=\"history_box__item--";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\">
                                        <td id=\"history_box__order_date--";
                    // line 225
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\" class=\"member_id\">
                                            ";
                    // line 226
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute($context["Order"], "order_date", array())), "html", null, true);
                    echo "
                                        </td>
                                        <td id=\"history_box__order_id--";
                    // line 228
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\" class=\"member_name\">
                                            <a href=\"";
                    // line 229
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_order_edit", array("id" => $this->getAttribute($context["Order"], "id", array()))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "</a>
                                        </td>
                                        <td id=\"history_box__order_total--";
                    // line 231
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\" class=\"member_tel\">
                                            ";
                    // line 232
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Order"], "total", array())), "html", null, true);
                    echo "
                                        </td>
                                        <td id=\"history_box__commit_date--";
                    // line 234
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\" class=\"member_mail\">
                                            ";
                    // line 235
                    echo twig_escape_filter($this->env, _twig_default_filter($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute($context["Order"], "commit_date", array())), "未発送"), "html", null, true);
                    echo "
                                        </td>
                                        <td id=\"history_box__payment_method--";
                    // line 237
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "id", array()), "html", null, true);
                    echo "\" class=\"member_mail\">
                                            ";
                    // line 238
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Order"], "payment_method", array()), "html", null, true);
                    echo "
                                        </td>
                                    </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Order'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 242
                echo "                                </tbody>
                            </table>
                        </div>
                    </div>
                    ";
            } else {
                // line 247
                echo "                    <div id=\"history_box__header\" class=\"data-empty\"><svg class=\"cb cb-inbox\"> <use xlink:href=\"#cb-inbox\" /></svg><p>データはありません</p>
                    </div>
                    ";
            }
            // line 250
            echo "                </div>
            </div>
            ";
        }
        // line 253
        echo "
            <div id=\"detail_box__footer\" class=\"row hidden-xs hidden-sm\">
                <div class=\"col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 text-center btn_area\">
                    <p><a href=\"";
        // line 256
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_customer_page", array("page_no" => (($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array(), "any", false, true), "get", array(0 => "eccube.admin.customer.search.page_no"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array(), "any", false, true), "get", array(0 => "eccube.admin.customer.search.page_no"), "method"), "1")) : ("1")))), "html", null, true);
        echo "?resume=1\">検索画面に戻る</a></p>
                </div>
            </div>

        </div><!-- /.col -->

        <div id=\"aside_column\" class=\"col-md-3\">
            <div id=\"common_box\" class=\"col_inner\">
                <div id=\"button_box\" class=\"box no-header\">
                    <div id=\"button_box__body\" class=\"box-body\">
                        <div class=\"row\">
                            <div class=\"col-xs-12\">
                                <div id=\"button_box__status\" class=\"form-group\">
                                    ";
        // line 269
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "status", array()), 'widget');
        echo "
                                    ";
        // line 270
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "status", array()), 'errors');
        echo "
                                </div>
                            </div>
                        </div>
                        <div id=\"button_box__insert_button\" class=\"row text-center\">
                            <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                <button class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">会員情報を登録</button>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <div id=\"shop_note_box\" class=\"box\">
                    <div id=\"shop_note_box__header\" class=\"box-header\">
                        <h3 class=\"box-title\">ショップ用メモ欄</h3>
                    </div><!-- /.box-header -->
                    <div id=\"shop_note_box__note\" class=\"box-body\">
                        ";
        // line 287
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "note", array()), 'widget');
        echo "
                        ";
        // line 288
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "note", array()), 'errors');
        echo "
                    </div>
                </div><!-- /.box -->

            </div>
        </div><!-- /.col -->
    </form>
</div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__d7582be3ec24b1744f4cc2092d4c1c8902fb689eadd2912177a42d80af87e54b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  592 => 288,  588 => 287,  568 => 270,  564 => 269,  548 => 256,  543 => 253,  538 => 250,  533 => 247,  526 => 242,  516 => 238,  512 => 237,  507 => 235,  503 => 234,  498 => 232,  494 => 231,  487 => 229,  483 => 228,  478 => 226,  474 => 225,  469 => 224,  465 => 223,  450 => 210,  448 => 209,  441 => 204,  439 => 203,  432 => 198,  426 => 197,  420 => 195,  417 => 194,  413 => 193,  405 => 188,  401 => 187,  395 => 184,  392 => 183,  386 => 179,  382 => 178,  377 => 176,  374 => 175,  368 => 171,  364 => 170,  359 => 168,  356 => 167,  350 => 163,  346 => 162,  341 => 160,  334 => 156,  330 => 155,  325 => 153,  322 => 152,  316 => 148,  312 => 147,  308 => 146,  300 => 145,  295 => 143,  292 => 142,  286 => 138,  282 => 137,  278 => 136,  270 => 135,  265 => 133,  262 => 132,  256 => 128,  252 => 127,  247 => 125,  244 => 124,  238 => 120,  234 => 119,  230 => 117,  224 => 113,  220 => 112,  216 => 110,  210 => 106,  206 => 105,  202 => 103,  195 => 98,  191 => 97,  187 => 96,  181 => 95,  176 => 93,  173 => 92,  167 => 88,  163 => 87,  158 => 85,  155 => 84,  149 => 80,  145 => 79,  141 => 78,  137 => 77,  132 => 75,  129 => 74,  123 => 70,  119 => 69,  115 => 68,  111 => 67,  106 => 65,  103 => 64,  101 => 63,  95 => 60,  91 => 58,  88 => 57,  77 => 48,  69 => 47,  66 => 46,  63 => 45,  51 => 35,  48 => 34,  42 => 30,  36 => 29,  32 => 25,  30 => 32,  28 => 27,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__d7582be3ec24b1744f4cc2092d4c1c8902fb689eadd2912177a42d80af87e54b", "");
    }
}
