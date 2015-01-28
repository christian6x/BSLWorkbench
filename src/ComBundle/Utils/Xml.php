<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



namespace ComBundle\Utils;

class Xml
{
        
    public function arrayToXML($array_in, $xml){
        $file = '/opt/www/error.txt';
           file_put_contents($file, $xml, FILE_APPEND);
//$xml = new SimpleXMLElement('<rootTag/>');


        file_put_contents($file, $xml, FILE_APPEND);
to_xml($xml, $array_in);
        file_put_contents($file, $xml, FILE_APPEND);
        
    return $xml;
}   

function to_xml(SimpleXMLElement $object, array $data)
{   
    foreach ($data as $key => $value)
    {   
        if (is_array($value))
        {   
            $new_object = $object->addChild($key);
            to_xml($new_object, $value);
        }   
        else
        {   
            $object->addChild($key, $value);
        }   
    }   
} 


}
    