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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
                                ";
        // line 9
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
                                ";
        // line 10
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "search", array()), 'row');
        echo "
                                ";
        // line 11
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "submit", array()), 'row');
        echo "
                            </form>
                    </div>
                </div>
            </div>
        </div>
    ";
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
        return array (  58 => 11,  54 => 10,  50 => 9,  46 => 8,  39 => 3,  36 => 2,  11 => 1,);
    }
}
