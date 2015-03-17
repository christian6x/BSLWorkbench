<?php
namespace ComBundle\Controller;
/*
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */

/**
 * Description of IpsUntrustedFuzzySearchController
 *
 * @author ksikora
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsFuzzySearchType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\SimpleXMLElement;

use ComBundle\Utils\Com;

use ComBundle\Utils\XML;

class IpsUntrustedFuzzySearchController extends Controller {
    
    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    
    public function renderAction()
    {
        
        $form = $this->get('form.factory')->create(new ipsFuzzySearchType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $form->bind($request);
            $data = $form->getData();
        }
        #return array('form' => $form->createView());
        return $this->render('ComBundle:untrusted:fuzzySearch.html.twig',array('form' => $form->createView()));
    }
    
        public function searchAction(Request $request, $refresh,$items,$page)
    {
        $result = [];
        $form = $this->get('form.factory')->create(new ipsFuzzySearchType());
        
        //$request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $comName = 'ips-untrusted-fuzzy-search';
            $form->bind($request);
            $data = $form->getData();
            $result = $data;
            $pageName = $request->request->get('value');
                 $file = '/opt/www/srak.txt';
            $tryiedRefresh = $request->request->get('refresh', null);
            file_put_contents($file, $tryiedRefresh, FILE_APPEND);
            if($tryiedRefresh != NULL)
            {
                $refresh = $tryiedRefresh;
            }
            
            if($refresh == "NO")
            {
                $state = 'NO';
            }
            else
            {
                $state = 'YES';
            }
            $state = 'YES';
            $isAjax = $request->isXmlHttpRequest();
        $file = '/opt/www/file.txt';
        // $xml .= '<' . $comName . '>';
        // $xml .= '<file-id>' . $data['fileId'] . '</file-id>';
        
        $string = '<'.$comName.'>'.'</'.$comName.'>';
        $s = new SimpleXMLElement($string);
        
        $string = '<'.'range'.'>'.'</'.'range'.'>';
        $range = $s->addChild('range');
        $range->addChild('items', $items);
        $range->addChild('page-no', $page);
             
        $order = $range->addChild('order-by', 'SIMILARITY');
        $order->addAttribute('asc', 'NO');
 
        $s->addChild('range',$range);
        file_put_contents($file, $s->asXML(), FILE_APPEND);
        
        $s->addChild('search', ($this->generateRandomString() . ' an'));
        try
        {
            $s->addChild('metric', $data['metric']);
        }
        catch(Exception $e)
        {
            $s->addChild('metric', '75');
        }
        $s->addChild('refresh', $state);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.92.2.33:10503/ips-untrusted-fuzzy-search');
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml')); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $s->asXML());
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
        
        
        $xmlParser = xml_parser_create('UTF-8');
        xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, 0);
        xml_parse_into_struct($xmlParser, $body, $fields);
        
        $xml = simplexml_load_string($body);
        $stext = $xml->count();
        $suggestions = [];
        $result = [];
        $replyHeader = [];
        file_put_contents($file, $body, FILE_APPEND);
        $repParams = [];
        $repParams['PAGE-SIZE'] = $items;
        foreach ($xml as $it => $va) {
            if ($it == 'reply') {
                foreach ($va as $ss => $zz) {
                    if ($ss == $comName) {
                        foreach ($zz->attributes() as $key => $value) {
                            file_put_contents($file, ($key."\n"), FILE_APPEND);
                            $repParams [strtoupper($key)] = (string)$value;
                        }
                        $result['REPLY-PARAMETERS'] = $repParams;
                        foreach ($zz as $key => $value) {
                            /*
                             * Header
                             *   start-time
                             *   end-time
                             *   similarity
                             */   
                            $replyHeader[$key] = (string)$value;
                            if ($key == 'black-list') {
                             /*
                             * Body
                             *  black-list
                             */
                                foreach ($value as $key => $innerValue) {
                                    $tmp = [];
                                    $tmp['VALUE'] = ''.$innerValue;
                                    foreach ($innerValue->attributes() as $key => $value) {
                                        file_put_contents($file, ($key."\n"), FILE_APPEND);
                                        $tmp[strtoupper($key)] = (string)$value;
                                    }
                                    
                                    
                                    $suggestions[] = $tmp;     
                                }
                                $result['BLACK-LIST'] = $suggestions;               
                            }
                        }
                    }
                    
                }
                $result['HEADER'] = $replyHeader;  
            }
        }

        
            
        }
        #return array('form' => $form->createView());
        return new JsonResponse(array('result' => $result));
       // return $this->render('ComBundle:com:filePost.html.twig',array('form' => $form->createView()));
    }
    
    

}
