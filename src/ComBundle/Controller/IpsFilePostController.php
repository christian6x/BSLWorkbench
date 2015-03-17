<?php
namespace ComBundle\Controller;
/* 
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsFilePostType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use ComBundle\Utils\Com;
use ComBundle\Utils\Xml;

class IpsFilePostController extends Controller
{
 public function renderAction()
    {
        
        $form = $this->get('form.factory')->create(new ipsFilePostType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $form->bind($request);
            $data = $form->getData();
        }
        #return array('form' => $form->createView());
        return $this->render('ComBundle:com:filePost.html.twig',array('form' => $form->createView()));
    }
    
     public function postAction()
    {
        $result = [];
        $form = $this->get('form.factory')->create(new ipsFilePostType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $comName = 'ips-file-post';
            $form->bind($request);
            $data = $form->getData();
            $result = $data;
            
            $file = '/opt/www/logf.txt';
            
            
//            $xmlObject = \ComBundle\Utils\Xml::create();
//            $xmlObject->createNode('sss', 'xxx');

         //   $xmlObject->createNode('file-id', 'sss');
           # echo $xmlObject->returnXml();
        /*            $xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
        
         *
         */ 
        $pageName = $request->request->get('value');
         
        $isAjax = $request->isXmlHttpRequest();
        
        // $xml .= '<' . $comName . '>';
        // $xml .= '<file-id>' . $data['fileId'] . '</file-id>';
        
        $s = new Xml($comName);
        $s->appendNode(Xml::createNode('file-id', $data['fileId']));
        $s->appendNode(Xml::createNode('file-type', $data['fileType']));
       
        $fdata = $s->addChild('file-data', $data['fileData']);
        $fdata->addAttribute('fmt', 'plain');
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.92.2.33:10503/ips-file-post');
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $s->returnXml());
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
    
        $response2 = curl_exec($ch);
        
        $response = $response2 ;
            
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        
        
        $xmlParser = xml_parser_create();
        xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($xmlParser, $body, $fields);
        
        $xml = simplexml_load_string($body);
        file_put_contents($file, $header, FILE_APPEND);
        $stext = $xml->count();
        $suggestions = array();
        $result = [];
        
        
        foreach ($xml as $it => $va) {

            if ($it == 'reply') {

                foreach ($va as $ss => $zz) {
                    if ($ss == $comName) {
                        foreach ($zz as $key => $value) {

                            if ($key == 'suggestion') {
                                $suggestions[] = '' . $value;
                                file_put_contents($file, $value, FILE_APPEND);
                            }
                        }
                    }
                    if ($ss == 'status')
                    {
                            foreach ($zz as $key => $value) {

                            $result[$key] = ''.$value;
                        }
                    }
                }
            }
        }

        
            
        }
        #return array('form' => $form->createView());
        return new JsonResponse(array('result' => $result));
       // return $this->render('ComBundle:com:filePost.html.twig',array('form' => $form->createView()));
    }
    
}