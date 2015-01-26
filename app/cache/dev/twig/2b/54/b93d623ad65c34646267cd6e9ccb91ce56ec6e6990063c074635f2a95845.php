<?php

/* AppBundle::base.html.twig */
class __TwigTemplate_2b54b93d623ad65c34646267cd6e9ccb91ce56ec6e6990063c074635f2a95845 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'top_c' => array($this, 'block_top_c'),
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
        <meta charset=\"UTF-8\" name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <!-- Bootstrap -->
        <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\"> 
        
            <!-- Bootstrap Stylesheet -->
        <link rel=\"stylesheet\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\">

        <!-- Animate -->
        <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/animate.min.css"), "html", null, true);
        echo "\">

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- FontAwesome Icons -->
        <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\">

        <!-- Normailize Stylesheet -->
        <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/normalize.min.css"), "html", null, true);
        echo "\">

        <link href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/templatemo_style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">
        <script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/vendor/modernizr-2.6.2.min.js"), "html", null, true);
        echo "\"></script>
        <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
        ";
        // line 27
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 28
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 29
        echo "    </head>
    <body>
    <!-- HEADER -->
    <header class=\"site-header\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"menu-holder\">
                    <div class=\"col-md-3 col-sm-2 logo\">
                        <a href=\"#\" title=\"BSL Logo\">
                            <img src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/bsl_logo.png"), "html", null, true);
        echo "\" alt=\"BSL\">
                        </a>
                    </div>
                    <div class=\"col-md-7 col-sm-8\">
                        <nav class=\"main-menu hidden-xs\">
                            <ul>
                                <li><a href=\"";
        // line 44
        echo $this->env->getExtension('routing')->getPath("_homepage");
        echo "\">Home</a></li>
                                ";
        // line 45
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 46
            echo "                                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("com_homepage");
            echo "\">Coms</a></li>
                                ";
        }
        // line 48
        echo "                            </ul>
                        </nav>
                    </div>
                    <div class=\"col-md-2 col-sm-2 col-xs-12\">                           
                        <ul class=\"social-top\">
                            ";
        // line 53
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 54
            echo "                                <li>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                            ";
        } else {
            // line 56
            echo "                                <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                                <li><a href=\"";
            // line 57
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                            ";
        }
        // line 58
        echo "  
                        </ul>
                    </div>
                </div>
                <div class=\"text-right visible-xs\">
                    <a href=\"#\" id=\"mobile_menu\"><span class=\"fa fa-bars\"></span></a>
                </div>
            </div>
        </div>
    </header> 
    
    
    <!-- TOP CONTENT -->
    ";
        // line 71
        $this->displayBlock('top_c', $context, $blocks);
        // line 84
        echo "
    

    <!-- FOOTER -->
    <footer class=\"site-footer\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-12 text-right\">
                    <p>Copyright &copy; Softax | Design: <a href=\"http://www.templatemo.com\">templatemo</a></p>
                </div> <!-- .col-md-12 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </footer> <!-- .site-footer -->
        
        ";
        // line 98
        $this->displayBlock('body', $context, $blocks);
        // line 99
        echo "        <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
        <script src=\"";
        // line 100
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
        <!-- Include all JavaScripts, compiled by Assetic -->
        <script src=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/vendor/jquery-1.10.1.min.js"), "html", null, true);
        echo "\"></script>
        <script>window.jQuery || document.write('<script src=\"js/vendor/jquery-1.10.1.min.js\"><\\/script>')</script>
        <script src=\"";
        // line 105
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/templatemo_custom.js"), "html", null, true);
        echo "\"></script> 
        ";
        // line 108
        $this->displayBlock('javascripts', $context, $blocks);
        // line 109
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "BSL Workbench";
    }

    // line 28
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 71
    public function block_top_c($context, array $blocks = array())
    {
        // line 72
        echo "    <div class=\"top-c\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-md-offset-1 col-lg-5 col-md-5 col-xs-offset-1 col-sm-5 col-xs-8 col-xs-offset-2\">
                    <!-- Miejsce na treść po lewej -->
                    
                </div>
                     <!-- Miejsce na treść po prawej -->
            </div>
        </div>
    </div>
    ";
    }

    // line 98
    public function block_body($context, array $blocks = array())
    {
    }

    // line 108
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
        return array (  252 => 108,  247 => 98,  232 => 72,  229 => 71,  224 => 28,  218 => 4,  212 => 109,  210 => 108,  206 => 107,  202 => 106,  198 => 105,  193 => 103,  189 => 102,  184 => 100,  181 => 99,  179 => 98,  163 => 84,  161 => 71,  146 => 58,  139 => 57,  132 => 56,  122 => 54,  120 => 53,  113 => 48,  107 => 46,  105 => 45,  101 => 44,  92 => 38,  81 => 29,  78 => 28,  76 => 27,  71 => 25,  67 => 24,  62 => 22,  56 => 19,  47 => 13,  41 => 10,  35 => 7,  29 => 4,  24 => 1,);
    }
}
