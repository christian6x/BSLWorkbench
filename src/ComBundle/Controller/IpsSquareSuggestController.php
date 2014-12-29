<?php

namespace ComBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsSquareSuggestType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
class IpsSquareSuggestController extends Controller
{
    public function renderAction()
    {
        $form = $this->get('form.factory')->create(new ipsSquareSuggestType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $form->bind($request);
            $data = $form->getData();
        }
        #return array('form' => $form->createView());
        return $this->render('ComBundle:sqr:suggest.html.twig',array('form' => $form->createView()));
    }
    public function suggestAction(Request $request)
    {
        #return array('form' => $form->createView());
        
        #return new Response('This is ajax',200);
        $suggestions = array();
        $suggestions[] = 'Perl';
        $suggestions[] = 'Php';
        
        return new JsonResponse(array('suggestionsArray' => $suggestions));
        #return $this->render('ComBundle:sqr:suggest.html.twig',array('form' => $form->createView()));
    }
}
