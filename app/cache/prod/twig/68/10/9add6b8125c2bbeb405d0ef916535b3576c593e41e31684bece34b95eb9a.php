<?php

/* ComBundle:sqr:suggest.html.twig */
class __TwigTemplate_68109add6b8125c2bbeb405d0ef916535b3576c593e41e31684bece34b95eb9a extends Twig_Template
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
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
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
                            
                            <form  action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("com_ips_square_search");
        echo "\" method=\"POST\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
                            ";
        // line 11
        echo "                                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'row');
        echo "
                                ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "search", array()), 'row', array("id" => "search_suggest", "autocomplete" => "off"));
        echo "
                                ";
        // line 13
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "submit", array()), 'row');
        echo "
                            </form>
                    </div>
                </div>
            </div>
        </div>   
    ";
    }

    // line 21
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 22
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "cfda9e6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_0") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui_1.css");
            // line 23
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
            // asset "cfda9e6_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_1") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui.min_2.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
            // asset "cfda9e6_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_2") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui.structure_3.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
            // asset "cfda9e6_3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_3") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui.structure.min_4.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
            // asset "cfda9e6_4"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_4") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui.theme_5.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
            // asset "cfda9e6_5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_5") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui.theme.min_6.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "cfda9e6"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6.css");
            echo "            <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 25
        echo "    ";
    }

    // line 26
    public function block_javascripts($context, array $blocks = array())
    {
        // line 27
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "9d688a3_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9d688a3_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_part_1_jquery-ui_1.js");
            // line 28
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
            // asset "9d688a3_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9d688a3_1") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_part_1_jquery-ui.min_2.js");
            // line 28
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
            // asset "9d688a3_2"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9d688a3_2") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main_part_1_suggest_3.js");
            // line 28
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        } else {
            // asset "9d688a3"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_9d688a3") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/main.js");
            // line 28
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("square_suggest");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 29
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        }
        unset($context["asset_url"]);
        // line 31
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
        return array (  184 => 31,  178 => 29,  173 => 28,  166 => 29,  161 => 28,  155 => 29,  150 => 28,  144 => 29,  139 => 28,  134 => 27,  131 => 26,  127 => 25,  83 => 23,  78 => 22,  75 => 21,  64 => 13,  60 => 12,  55 => 11,  49 => 9,  41 => 3,  38 => 2,  11 => 1,);
    }
}
