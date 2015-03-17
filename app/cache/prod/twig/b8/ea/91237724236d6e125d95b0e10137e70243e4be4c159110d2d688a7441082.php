<?php

/* FOSUserBundle::layout.html.twig */
class __TwigTemplate_b8ea91237724236d6e125d95b0e10137e70243e4be4c159110d2d688a7441082 extends Twig_Template
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
            'fos_user_content' => array($this, 'block_fos_user_content'),
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
        echo "    <div class=\"top-c\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-md-offset-3 col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                        ";
        // line 8
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 9
            echo "                            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 10
                echo "                                <div class=\"flash-";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
                                    ";
                // line 11
                echo twig_escape_filter($this->env, $context["message"], "html", null, true);
                echo "
                                </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                        <h3 class=\"topc-title\">
                            ";
        // line 16
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "_route"), "method") == "fos_user_security_login")) {
            echo " 
                                ";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "
                            ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 18
(isset($context["app"]) ? $context["app"] : null), "request", array()), "get", array(0 => "_route"), "method") == "fos_user_registration_register")) {
            // line 19
            echo "                                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html", null, true);
            echo "
                            ";
        }
        // line 21
        echo "                        </h3>
                        ";
        // line 22
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 23
        echo "                    </div>
                </div>
            </div>
        </div>   
";
    }

    // line 22
    public function block_fos_user_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "FOSUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 22,  99 => 23,  97 => 22,  94 => 21,  88 => 19,  86 => 18,  82 => 17,  78 => 16,  75 => 15,  69 => 14,  60 => 11,  55 => 10,  50 => 9,  46 => 8,  40 => 4,  37 => 3,  11 => 1,);
    }
}
