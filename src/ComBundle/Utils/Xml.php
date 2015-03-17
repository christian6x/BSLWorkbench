<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ComBundle\Utils;

use Symfony\Component\DependencyInjection\SimpleXMLElement;

class Xml
{
    protected $ObjXml;
    public function __construct($root) {
        
        /*
         * 
         * $this->ObjXml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" standalone="yes"?><'.$rootNode.'></'.$rootNode.'>');
         * 
         */
        //$xml = new SimpleXMLElement('<xml/>');
        
        $string = '<'.$root.'>'.'</'.$root.'>';
            $file = '/opt/www/error.txt';
           file_put_contents($file, $string, FILE_APPEND);
        $this->ObjXml = new SimpleXMLElement($string);
    }    
    
    public static function create()
    {
        $instance = new self();
        return $instance;
    }
    
    public function returnXml()
    {
         $file = '/opt/www/error.txt';
           file_put_contents($file, $this->ObjXml->asXML(), FILE_APPEND);
        return $this->ObjXml->asXML();
    }
    
    public function addChild($name,$value)
    {
        return $this->ObjXml->addChild($name, $value);
    }
    
    public function appendNode(SimpleXMLElement $node)
    {
        $this->ObjXml->addChild($node->getName(), $node);        
    }
    
    public function getName()
    {
        return $this->ObjXml->getName();
    }
    
    public function appendNodeXml($node)
    {
            
        $this->ObjXml->addChild($node->getName(), $node);        
    }
    
    public static function createNode($name, $value="")
    {
            $file = '/opt/www/error.txt';
           file_put_contents($file, $name, FILE_APPEND);
        try
        {
            $string = '<'.$name.'>'.$value.'</'.$name.'>';
            return new SimpleXMLElement($string);
            //return new \SimpleXMLElement($name);
        }
        catch(Exception $e)
        {
            $file = '/opt/www/error.txt';
           file_put_contents($file, $e, FILE_APPEND);
            
        }
    }
    
    public function arrayToXML($array_in, $xml){

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
    