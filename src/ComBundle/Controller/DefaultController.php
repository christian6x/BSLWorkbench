<?php

namespace ComBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ComBundle:Default:index.html.twig');
    }
}
