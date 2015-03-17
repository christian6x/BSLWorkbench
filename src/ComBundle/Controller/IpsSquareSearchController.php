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
use ComBundle\Utils\Xml;


class Crawler {

    public $url = false;
    protected $xpath = false;

    public function init() {

        $xmlDoc = new \DOMDocument();
        @$xmlDoc->loadHTML(file_get_contents($this->url));
        $this->xpath = new \DOMXPath(@$xmlDoc);
    }
    
    
    
    public function getInnerText($tag, $limit = 10) {        

    $content = Array();
    $searchNode = $this->xpath->query("(//{$tag})[position() <= {$limit}]");

    foreach ($searchNode as $node) {
        $content[] = $node->nodeValue;
    }

    return $content;
}
public function getTagAtrributes($tag, $attr, $limit = 10) {

    $attributes = Array();
    $searchNode = $this->xpath->query("(//{$tag})[position() <= {$limit}]");

    foreach ($searchNode as $node) {
        $attributes[] = $node->getAttribute($attr);
    }

    return $attributes;
}




}


class Index
{
    protected $url;
    protected $title;
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    
    public function getTitle()
    {
        return $this->title;
    }
}

class IpsSquareSearchController extends Controller {
    //put your code here
    
    public function crawl_page($url, $depth = 5)
{
    static $seen = array();
  if (isset($seen[$url]) || $depth === 0) {
    return;
  }

  $seen[$url] = true;

  $dom = new \DOMDocument('1.0');
  @$dom->loadHTMLFile($url);

  $anchors = $dom->getElementsByTagName('a');
  foreach ($anchors as $element) {
    $href = $element->getAttribute('href');
    if (0 !== strpos($href, 'http')) {
       /* this is where I changed hobodave's code */
        $host = "http://".parse_url($url,PHP_URL_HOST);
        $href = $host. '/' . ltrim($href, '/');
    }
    $this->crawl_page($href, $depth - 1);
  }
    
  
  $images = $dom->getElementsByTagName('img');
  
  
  $list = $dom->getElementsByTagName('li');
           //$var[] = new Index();
           $var = [];
  foreach ($images as $xx)
  {
      
      $attr = $xx->getAttribute('href');
      $in = new Index();
      $in->setUrl($attr);
      $in->setTitle($attr);
    //  $var[] = $in;
  }
    
           
           
           
           
           
           
foreach ($list as $pos) {
                
//    $pos->getElementsByTagName('img');
        if($pos->hasChildNodes())
        {
                $in = new Index();
            foreach($pos->childNodes as $childs)
            {
                // Jestem w li
                if($childs->nodeName == 'div')
                {
                    if($childs->hasChildNodes())
                    {
                        
                        
                
                        // Jestem w a
                        
                      
                        
                         $ob = $childs->childNodes;
                         foreach($ob as $ch)
                         {
                             
                             if($ch->nodeName == 'a')
                             {
                                 $in->setUrl($ch->getAttribute('href'));
                                    echo $ch->nodeValue;
                                 
                                         //   $ss = $ch->firstChild;
                          //  if($ss->nodeName == 'img')
                          //   {
                              //   $tmp['img'] = $ss->getAttribute('src');
                                 //echo $ss;
                          //  }
                                 
                            }
                            else if($ch->nodeName == 'div')
                            {
                                 $ss = $ch->childNodes;
                           foreach($ss as $c)
                         {  
                               if($c->nodeName == 'span')
                               {
                                   $in->setTitle($c->getAttribute('title'));
                                   
                                    
                               }
                           }
                            }
                            
                            
                             
                         }
                         
                         
                    }
                
                   
                }
                
            }
            
            if(!is_null($in->getTitle())  && !is_null($in->getUrl()))
            {
                
                $var[] = $in;
                unset($in);
            }
                
            
        }
        
      
    
}
$file = '/opt/www/res.txt';
  foreach ($var as $ele)
        {
            //echo $ele->getTitle();
            //echo $ele->getUrl();
            $txt = '|' . $ele->getTitle() . '|' . $ele->getUrl() . '|' . "\n";
                  file_put_contents($file, $txt,FILE_APPEND);
        }
 // echo "New Page:<br /> ";
 // echo "URL:",$url,PHP_EOL,"<br />","CONTENT:",PHP_EOL,$dom->saveHTML(),PHP_EOL,PHP_EOL,"  <br /><br />";

  

    //echo "URL:",$url,PHP_EOL,"CONTENT:",PHP_EOL,$dom->saveHTML(),PHP_EOL,PHP_EOL;
}
    
    
    public function renderResultAction(Request $request,$items,$page)
    {
        $session = $this->getRequest()->getSession();
        $comName = 'ips-square-search';
        $form = $this->get('form.factory')->create(new ipsSquareSuggestType());
        
        $request = $this->get('request');
        if ('POST' == $request->getMethod())
        {
            $form->bind($request);
            $data = $form->getData();
            $value = $data['search'];
            $context = $data['context'];
            $session->set('value',$value);
        }
        else
        {
            $value = $session->get('value');
        }
        
        
            //$this->crawl_page("http://www.xnxx.com", 5);
          
            
            
     //   $oXml = new \ComBundle\Utils\Xml($comName);
     //   $mocz = new Xml();
   //     $mocz->createNode("mocz");
        
        
    //    $ele = $s->createNode("guwno");
    //    $x = $s->createNode("sss","raz");
      //  $ele->addChild($x->getName(),$x);
      //  $s->appendNode($ele, $x);
        
      //  echo $mocz->asXML();
        
        $xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
        
        $xml .= '<' . $comName . '>';
        $xml .= '<range>';
        $xml .= '<items>' . $items . '</items>';
        $xml .= '<page-no>' . $page . '</page-no>';
        $xml .= '<order-by asc="yes">' . 'SEQ' . '</order-by>';
        $xml .= '</range>';
        
        $xml .= '<value>' . $value. '</value>';
        $xml .= '<context>' . $context . '</context>';
        
        $xml .= '</' . $comName . '>';
        
        $op = simplexml_load_string($xml);
        
        $file = '/opt/www/error.txt';
      //  file_put_contents($file, $oXml->returnXml());
      //  echo $oXml->returnXml();
//echo $op->asXML();
        
        
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
        foreach ($xml as $it=>$va)
        {
            echo $it;
        if($it == 'reply')
            {
        
        foreach ($va as $ss=>$zz)
        {
            if($ss == $comName)
            {
            foreach ($zz as $key=>$value)
        {
            
            
                echo $key;
            
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
        }
        }
            }
        }
        
        return $this->render('ComBundle:sqr:searchResult.html.twig',array('result' => $resultData));
    }
    
}
