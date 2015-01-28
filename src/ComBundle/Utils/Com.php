<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ComBundle\Utils;

use ComBundle\Utils\Xml;

class Com
{    
        public function generateBodyFromArray($bodyArray)
        {
            $body = '<?xml version="1.0"?>';
            $xml = new Xml();
            $file = '/opt/www/debug.txt';
            file_put_contents($file, $bodyArray);
      
            foreach ($bodyArray as $key => $val)
            {
                file_put_contents($file, $key . $val, FILE_APPEND);
            }
            
            try
            {
                
                $body .= $xml->arrayToXML($bodyArray);
              //  file_put_contents($file, $body);
            }
            catch (Exception $e)
            {
                $body = '<?xml version="1.0"?><exception>Exception occured ' + $e + "</exception>";
               // file_put_contents($file, $body);
            }
                  
            return $body;
        }
    
    
        public function sendRequest()
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
        
        }
         
    
}