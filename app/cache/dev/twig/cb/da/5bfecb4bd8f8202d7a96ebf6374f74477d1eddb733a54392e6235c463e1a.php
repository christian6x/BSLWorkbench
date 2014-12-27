<?php

/* AppBundle::base.html.twig */
class __TwigTemplate_cbda5bfecb4bd8f8202d7a96ebf6374f74477d1eddb733a54392e6235c463e1a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 5
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 6
        echo "        <meta charset=\"UTF-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <!-- Bootstrap -->
        <link href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">

        <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
        ";
        // line 11
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 12
        echo "    </head>
    <body>
        ";
        // line 14
        $this->displayBlock('body', $context, $blocks);
        // line 15
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 16
        echo "        <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
        <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
        <!-- Include all JavaScripts, compiled by Assetic -->
        <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
    }

    // line 15
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "AppBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 15,  82 => 14,  77 => 5,  71 => 4,  63 => 19,  58 => 17,  55 => 16,  52 => 15,  50 => 14,  46 => 12,  44 => 11,  38 => 8,  34 => 6,  32 => 5,  28 => 4,  23 => 1,);
    }
}
