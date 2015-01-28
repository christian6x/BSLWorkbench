<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IpsSquareSearchController
 *
 * @author ksikora
 */

namespace ComBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsSquareSuggestType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IpsSquareSearchController extends Controller {
    //put your code here
    
    public function renderResultAction(Request $request,$items,$page)
    {
        $comName = 'ips-square-search';
        $form = $this->get('form.factory')->create(new ipsSquareSuggestType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $form->bind($request);
            $data = $form->getData();
            $value = $data['search'];
        }
        
        $xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
        
        $xml .= '<' . $comName . '>';
        $xml .= '<range>';
        $xml .= '<items>' . $items . '</items>';
        $xml .= '<page-no>' . $page . '</page-no>';
        $xml .= '<order-by asc="yes">' . 'SEQ' . '</order-by>';
        $xml .= '</range>';
        
        $xml .= '<value>' . $value. '</value>';
        $xml .= '<context>' . 1 . '</context>';
        
        $xml .= '</' . $comName . '>';
        $file = '/opt/www/error.txt';
        
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.92.2.33:10503/'.$comName);
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response2 = curl_exec($ch);
        
        $xmlParser = xml_parser_create();
        xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($xmlParser, $response2, $fields);
        
        $xml = simplexml_load_string($response2);
        $stext = $xml->count();
        $resultData = array();
        foreach ($xml as $key=>$value)
        {
            if($key == 'suggestions')
            {
                foreach ($value as $keyInner=>$valueInner)
                {
                    if($keyInner == 'suggestion')
                    {
                        $tmp = array();
                        foreach ($valueInner as $keyInnerPrim=>$valueInnerPrim)
                        {
                            $tmp[$keyInnerPrim] = $valueInnerPrim;
                        }
                        
                        $resultData[] = $tmp;
                    }
                }
            }
            
        }
        
        return $this->render('ComBundle:sqr:searchResult.html.twig',array('result' => $resultData));
    }
    
}
