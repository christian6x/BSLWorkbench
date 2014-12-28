<?php

namespace ComBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsSquareSuggestType;

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
            if ($form->isValid())
            {
                echo $data['search'];
            }
        }
        #return array('form' => $form->createView());
        return $this->render('ComBundle:sqr:suggest.html.twig',array('form' => $form->createView()));
    }
}
