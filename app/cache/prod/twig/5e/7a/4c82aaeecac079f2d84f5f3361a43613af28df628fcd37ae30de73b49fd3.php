<?php

/* ComBundle:sqr:suggest.html.twig */
class __TwigTemplate_5e7a4c82aaeecac079f2d84f5f3361a43613af28df628fcd37ae30de73b49fd3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'top_c' => array($this, 'block_top_c'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "AppBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_top_c($context, array $blocks = array())
    {
        // line 3
        echo "        <div class=\"top-c\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                        <h3 class=\"topc-title\">ips-square-suggest</h3>
                            <form  action=\"#\" method=\"POST\" ";
        // line 8
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
                                ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'row');
        echo "
                                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "search", array()), 'row', array("id" => "search_suggest"));
        echo "
                                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "submit", array()), 'row');
        echo "
                            </form>
                    </div>
                </div>
            </div>
        </div>
    ";
        // line 17
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "13b8adf_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_13b8adf_0") : $this->env->getExtension('assets')->getAssetUrl("js/13b8adf_suggest_1.js");
            // line 18
            echo "        <script>
                var path_to_controller = \"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";
        </script>
        <script src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
            echo "\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
    ";
        } else {
            // asset "13b8adf"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_13b8adf") : $this->env->getExtension('assets')->getAssetUrl("js/13b8adf.js");
            // line 18
            echo "        <script>
                var path_to_controller = \"";
            // line 19
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";
        </script>
        <script src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
            echo "\"></script>
        <script type=\"text/javascript\" src=\"";
            // line 22
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/>
    ";
        }
        unset($context["asset_url"]);
        // line 24
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ComBundle:sqr:suggest.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 24,  102 => 22,  98 => 21,  93 => 19,  90 => 18,  83 => 22,  79 => 21,  74 => 19,  71 => 18,  67 => 17,  58 => 11,  54 => 10,  50 => 9,  46 => 8,  39 => 3,  36 => 2,  11 => 1,);
    }
}
