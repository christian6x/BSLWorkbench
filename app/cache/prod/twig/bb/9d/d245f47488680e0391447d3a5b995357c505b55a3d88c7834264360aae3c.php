<?php

/* ComBundle:com:filePost.html.twig */
class __TwigTemplate_bb9dd245f47488680e0391447d3a5b995357c505b55a3d88c7834264360aae3c extends Twig_Template
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
                        <h3 class=\"topc-title\">ips-file-post</h3>
                            
                            <form id=\"formFilePost\" action=\"#\" method=\"POST\" ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'enctype');
        echo ">
                            ";
        // line 12
        echo "                               ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'rest');
        echo "
                            </form>
                    </div>
                </div>
            </div>
        </div>   
                            ";
        // line 19
        echo "    ";
    }

    // line 30
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 31
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "cfda9e6_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_cfda9e6_0") : $this->env->getExtension('assets')->getAssetUrl("css/cfda9e6_part_1_jquery-ui_1.css");
            // line 32
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
        // line 34
        echo "    ";
    }

    // line 36
    public function block_javascripts($context, array $blocks = array())
    {
        // line 37
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "d054a4c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d054a4c_0") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/filePost_part_1_post_1.js");
            // line 38
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("comFilePost");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        } else {
            // asset "d054a4c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_d054a4c") : $this->env->getExtension('assets')->getAssetUrl("js/compiled/filePost.js");
            // line 38
            echo "            <script>var path_to_controller = \"";
            echo $this->env->getExtension('routing')->getPath("comFilePost");
            echo "\";</script>
            <script type=\"text/javascript\" src=\"";
            // line 39
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : null), "html", null, true);
            echo "\"/></script>
        ";
        }
        unset($context["asset_url"]);
        // line 41
        echo "    ";
    }

    public function getTemplateName()
    {
        return "ComBundle:com:filePost.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 41,  148 => 39,  143 => 38,  136 => 39,  131 => 38,  126 => 37,  123 => 36,  119 => 34,  75 => 32,  70 => 31,  67 => 30,  63 => 19,  53 => 12,  49 => 10,  41 => 4,  38 => 3,  11 => 2,);
    }
}
