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
            'mid_c' => array($this, 'block_mid_c'),
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
";
        // line 11
        echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css\">
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
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/vendor/modernizr-2.6.2.min.js"), "html", null, true);
        echo "\"></script>
        <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
        ";
        // line 28
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 29
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 30
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
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/bsl_logo.png"), "html", null, true);
        echo "\" alt=\"BSL\">
                        </a>
                    </div>
                    <div class=\"col-md-7 col-sm-8\">
                        <nav class=\"main-menu hidden-xs\">
";
        // line 51
        echo "                        </nav>
                            
                            
                            <nav class=\"main-menu navbar navbar-default navbar-blue\" role=\"navigation\">
     <div class=\"container-fluid\" id=\"navfluid\">
       <div class=\"navbar-header\">
       <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navigationbar\">
       <span class=\"sr-only\">Toggle navigation</span>
       <span class=\"icon-bar\"></span>
       <span class=\"icon-bar\"></span>
       <span class=\"icon-bar\"></span>
      </button>
     <a class=\"navbar-brand\" href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("_homepage");
        echo "\">BSL</a>
    </div>
<div class=\"collapse navbar-collapse\" id=\"navigationbar\" >
<ul class=\"nav navbar-nav\">
   <li><a href=\"";
        // line 67
        echo $this->env->getExtension('routing')->getPath("_homepage");
        echo "\">Home</a></li>
   ";
        // line 68
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 69
            echo "        <li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"";
            echo $this->env->getExtension('routing')->getPath("com_homepage");
            echo "\">COMS<span class=\"caret\"></span></a>
          <ul class=\"dropdown-menu\">
            <li><a href=\"";
            // line 71
            echo $this->env->getExtension('routing')->getPath("com_ips_square_suggest");
            echo "\">ips-square-suggest</a></li>
            <li><a href=\"";
            // line 72
            echo $this->env->getExtension('routing')->getPath("com_ips_file_post");
            echo "\">ips-file-post</a></li>
            <li><a href=\"";
            // line 73
            echo $this->env->getExtension('routing')->getPath("com_ips_untrusted_fuzzy_search");
            echo "\">ips-untrusted-fuzzy-search</a></li>
          </ul>
        </li>
   ";
        }
        // line 77
        echo "
</ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
                            
                            
                            
                            
                    </div>
                    <div class=\"col-md-2 col-sm-2 col-xs-12\">                           
                        <ul class=\"social-top\">
                            ";
        // line 89
        if ($this->env->getExtension('security')->isGranted("IS_AUTHENTICATED_REMEMBERED")) {
            // line 90
            echo "                                <li>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logged_in_as", array("%username%" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array())), "FOSUserBundle"), "html", null, true);
            echo "<a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_logout");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.logout", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                            ";
        } else {
            // line 92
            echo "                                <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("fos_user_security_login");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.login", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                                <li><a href=\"";
            // line 93
            echo $this->env->getExtension('routing')->getPath("fos_user_registration_register");
            echo "\"><span class=\"hidden-xs\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("layout.register", array(), "FOSUserBundle"), "html", null, true);
            echo "</span></a></li>
                            ";
        }
        // line 94
        echo "  
                        </ul>
                    </div>
                </div>
           ";
        // line 101
        echo "            </div>
        </div>
    </header> 
    
    
    <!-- TOP CONTENT -->
    ";
        // line 107
        $this->displayBlock('top_c', $context, $blocks);
        // line 120
        echo "        <div class=\"content-section\" id=\"middle-content\">
            <div class=\"container\">
    ";
        // line 122
        $this->displayBlock('mid_c', $context, $blocks);
        // line 140
        echo "           </div> 
        </div> 
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
        // line 153
        $this->displayBlock('body', $context, $blocks);
        // line 154
        echo "        <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
        <script src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js\"></script>
        <!-- Include all JavaScripts, compiled by Assetic -->
";
        // line 158
        echo "        <script src=\"//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js\"></script>
";
        // line 161
        echo "        <script>window.jQuery || document.write('<script src=\"js/vendor/jquery-1.10.1.min.js\"><\\/script>')</script>
";
        // line 163
        echo "        <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/plugins.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 164
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/templatemo_custom.js"), "html", null, true);
        echo "\"></script> 
        ";
        // line 165
        $this->displayBlock('javascripts', $context, $blocks);
        // line 166
        echo "    </body>
</html>
";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "BSL Workbench";
    }

    // line 29
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 107
    public function block_top_c($context, array $blocks = array())
    {
        // line 108
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

    // line 122
    public function block_mid_c($context, array $blocks = array())
    {
        // line 123
        echo "
                <div class=\"row\">
                    <div class=\"col-md-3 col-xs-6 text-center\">

                    </div> 
                    <div class=\"col-md-3 col-xs-6 text-center\">

                    </div> 
                    <div class=\"col-md-3 col-xs-6 text-center\">

                    </div> 
                    <div class=\"col-md-3 col-xs-6 text-center\">

                    </div>
                </div>
     
    ";
    }

    // line 153
    public function block_body($context, array $blocks = array())
    {
    }

    // line 165
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
        return array (  313 => 165,  308 => 153,  288 => 123,  285 => 122,  270 => 108,  267 => 107,  262 => 29,  256 => 4,  250 => 166,  248 => 165,  244 => 164,  239 => 163,  236 => 161,  233 => 158,  228 => 154,  226 => 153,  211 => 140,  209 => 122,  205 => 120,  203 => 107,  195 => 101,  189 => 94,  182 => 93,  175 => 92,  165 => 90,  163 => 89,  149 => 77,  142 => 73,  138 => 72,  134 => 71,  128 => 69,  126 => 68,  122 => 67,  115 => 63,  101 => 51,  93 => 40,  81 => 30,  78 => 29,  76 => 28,  71 => 26,  66 => 24,  61 => 22,  55 => 19,  46 => 13,  42 => 11,  36 => 7,  30 => 4,  25 => 1,);
    }
}
