<?php

/* ComBundle:untrusted:fuzzySearch.html.twig */
class __TwigTemplate_abc3b24499dcaf00478275633a63a00a5c3519f21953bb00d2569727ecd09e22 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        try {
            $this->parent = $this->env->loadTemplate("AppBundle::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(2);

            throw $e;
        }

        $this->blocks = array(
            'top_c' => array($this, 'block_top_c'),
            'mid_c' => array($this, 'block_mid_c'),
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

    // line 3
    public function block_top_c($context, array $blocks = array())
    {
        // line 4
        echo "        <div class=\"top-c\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                        <h3 class=\"topc-title\">ips-untrusted-fuzzy-search</h3>
                            
                            <form id=\"formFuzzySearch\" action=\"#\" method=\"POST\" ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
                            ";
        // line 12
        echo "                                ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'row');
        echo "
                              
                                ";
        // line 14
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                            </form>
                    </div>
                </div>
            </div>
        </div>   
                            
    ";
    }

    // line 22
    public function block_mid_c($context, array $blocks = array())
    {
        // line 23
        echo "        <div class=\"row\">
            <div class=\"col-md-1 col-lg-6 text-center\">
                    <div id=\"fuzzySearchResult\"></div>
            </div> 
        </div>
    ";
    }

    // line 29
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 30
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "cfda9e6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_0") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui_1.css");
            // line 31
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
        // line 33
        echo "    ";
    }

    // line 35
    public function block_javascripts($context, array $blocks = array())
    {
        // line 36
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "2ebfaae_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2ebfaae_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/untrusted_part_1_fuzzySearch_1.js");
            // line 37
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("comUntrustedFuzzySearch");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        } else {
            // asset "2ebfaae"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_2ebfaae") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/untrusted.js");
            // line 37
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("comUntrustedFuzzySearch");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        }
        unset($context["asset_url"]);
        // line 40
        echo "     
    ";
    }

    public function getTemplateName()
    {
        return "ComBundle:untrusted:fuzzySearch.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 40,  165 => 38,  160 => 37,  153 => 38,  148 => 37,  143 => 36,  140 => 35,  136 => 33,  92 => 31,  87 => 30,  84 => 29,  75 => 23,  72 => 22,  60 => 14,  54 => 12,  50 => 10,  42 => 4,  39 => 3,  11 => 2,);
    }
}
