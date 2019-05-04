<?php

/* Mail/entry_confirm.twig */
class __TwigTemplate_11a4d76c2532043f25138a35cc2c14f6eac52367351b6b54f3e028a28cfd3d6e extends Twig_Template
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
        echo "　※本メールは自動配信メールです。
　等幅フォント(MSゴシック12ポイント、Osaka-等幅など)で
　最適にご覧になれます。

┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "より会員登録を希望された方に
　お送りしています。
　もしお心当たりが無い場合はこのままこのメールを破棄していただ
　ければ会員登録はなされません。
　またその旨 ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "email02", array()), "html", null, true);
        echo " まで
　ご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "name01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "name02", array()), "html", null, true);
        echo " 様

";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "でございます。

この度は会員登録依頼をいただきまして、有り難うございます。

現在は仮登録の状態です。
　　　~~~~~~
本会員登録を完了するには下記URLにアクセスしてください。
※入力されたお客様の情報はSSL暗号化通信により保護されます。

";
        // line 47
        echo twig_escape_filter($this->env, ($context["activateUrl"] ?? null), "html", null, true);
        echo "

上記URLにて本会員登録が完了いたしましたら改めてご登録内容ご確認
メールをお送り致します。



";
    }

    public function getTemplateName()
    {
        return "Mail/entry_confirm.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 47,  48 => 38,  41 => 36,  34 => 32,  27 => 28,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Mail/entry_confirm.twig", "C:\\xampp\\htdocs\\eccube2\\src\\Eccube\\Resource\\template\\default\\Mail\\entry_confirm.twig");
    }
}
