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
        
        $session = $this->getRequest()->getSession();
            $xml = '<?xml version="1.0"?><value>test</value>';
         $fields_string = [ "value" ];
         $fields["value"] = "test";
        #return array('form' => $form->createView());
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.92.2.33:10503/test');
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                 $session->set('ch', $ch);
        $response2 = curl_exec($ch);
        
        $xmlParser = xml_parser_create_ns();
        xml_parse_into_struct($xmlParser, $response2, $fields);
        
        
        
        $session->set('curl', $fields);
        #return new Response('This is ajax',200);
        $suggestions = array();
        $suggestions[] = 'Perl';
        $suggestions[] = 'Php';
        
        return new JsonResponse(array('suggestionsArray' => $suggestions));
        #return $this->render('ComBundle:sqr:suggest.html.twig',array('form' => $form->createView()));
    }
}
