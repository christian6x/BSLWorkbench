<?php

namespace ComBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ComBundle\Form\ipsSquareSuggestType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use ComBundle\Utils\Com;

class IpsSquareSuggestController extends Controller {

    function xml2array($contents, $get_attributes = 1, $priority = 'tag') {
        if (!$contents)
            return array();

        if (!function_exists('xml_parser_create')) {
            //print "'xml_parser_create()' function not found!";
            return array();
        }

        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create('');
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($contents), $xml_values);
        xml_parser_free($parser);

        if (!$xml_values)
            return; //Hmm...

            
//Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array; //Refference
        //Go through the tags.
        $repeated_tag_index = array(); //Multiple tags with same name will be turned into an array
        foreach ($xml_values as $data) {
            unset($attributes, $value); //Remove existing values, or there will be trouble
            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data); //We could use the array by itself, but this cooler.

            $result = array();
            $attributes_data = array();

            if (isset($value)) {
                if ($priority == 'tag')
                    $result = $value;
                else
                    $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
            }

            //Set the attributes too.
            if (isset($attributes) and $get_attributes) {
                foreach ($attributes as $attr => $val) {
                    if ($priority == 'tag')
                        $attributes_data[$attr] = $val;
                    else
                        $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                }
            }

            //See tag status and do the needed.
            if ($type == "open") {//The starting of the tag '<tag>'
                $parent[$level - 1] = &$current;
                if (!is_array($current) or ( !in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    if ($attributes_data)
                        $current[$tag . '_attr'] = $attributes_data;
                    $repeated_tag_index[$tag . '_' . $level] = 1;

                    $current = &$current[$tag];
                } else { //There was another element with the same tag name
                    if (isset($current[$tag][0])) {//If there is a 0th element it is already an array
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;
                        $repeated_tag_index[$tag . '_' . $level] ++;
                    } else {//This section will make the value an array if multiple tags with the same name appear together
                        $current[$tag] = array($current[$tag], $result); //This will combine the existing item and the new item together to make an array
                        $repeated_tag_index[$tag . '_' . $level] = 2;

                        if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                            unset($current[$tag . '_attr']);
                        }
                    }
                    $last_item_index = $repeated_tag_index[$tag . '_' . $level] - 1;
                    $current = &$current[$tag][$last_item_index];
                }
            } elseif ($type == "complete") { //Tags that ends in 1 line '<tag />'
                //See if the key is already taken.
                if (!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;
                    $repeated_tag_index[$tag . '_' . $level] = 1;
                    if ($priority == 'tag' and $attributes_data)
                        $current[$tag . '_attr'] = $attributes_data;
                } else { //If taken, put all things inside a list(array)
                    if (isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...
                        // ...push the new element into that array.
                        $current[$tag][$repeated_tag_index[$tag . '_' . $level]] = $result;

                        if ($priority == 'tag' and $get_attributes and $attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                        }
                        $repeated_tag_index[$tag . '_' . $level] ++;
                    } else { //If it is not an array...
                        $current[$tag] = array($current[$tag], $result); //...Make it an array using using the existing value and the new value
                        $repeated_tag_index[$tag . '_' . $level] = 1;
                        if ($priority == 'tag' and $get_attributes) {
                            if (isset($current[$tag . '_attr'])) { //The attribute of the last(0th) tag must be moved as well
                                $current[$tag]['0_attr'] = $current[$tag . '_attr'];
                                unset($current[$tag . '_attr']);
                            }

                            if ($attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag . '_' . $level] . '_attr'] = $attributes_data;
                            }
                        }
                        $repeated_tag_index[$tag . '_' . $level] ++; //0 and 1 index is already taken
                    }
                }
            } elseif ($type == 'close') { //End of tag '</tag>'
                $current = &$parent[$level - 1];
            }
        }

        return($xml_array);
    }

    public function renderAction() {

        $form = $this->get('form.factory')->create(new ipsSquareSuggestType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bind($request);
            $data = $form->getData();
        }
        #return array('form' => $form->createView());
        return $this->render('ComBundle:sqr:suggest.html.twig', array('form' => $form->createView()));
    }

    public function suggestAction(Request $request) {
        $comName = 'ips-square-suggest';

        $session = $this->getRequest()->getSession();
        $session->clear();
        $xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>";
        $data = $request->getContent();
        $pageName = $request->request->get('value');
        $context = $request->request->get('context');
        $isAjax = $request->isXmlHttpRequest();
        $xml .= '<' . $comName . '>';
        $xml .= '<value>' . $pageName . '</value>';
        $xml .= '<context>' . $context . '</context>';
        $xml .= '<word-suggestions>' . 100 . '</word-suggestions>';
        $xml .= '<phrase-depth>' . 100 . '</phrase-depth>';
        $xml .= '<word-depth>' . 100 . '</word-depth>';

        $xml .= '</' . $comName . '>';
        $file = '/opt/www/error.txt';

        /*
          $com = new Com();
          $fields =  array();
          $fields['test'] = "val";
          $rootNode = new SimpleXMLElement( "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>" );
          $s = $rootNode;
         */
        $s = $xml;
        //$s = $com->generateBodyFromArray($fields,$rootNode);
        //$session->set('comgenerateBody', $com->generateBody($fields));
        //$session->set('support', $s);
        #return array('form' => $form->createView());
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://10.92.2.33:10503/ips-square-suggest');
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $s);
        // curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response2 = curl_exec($ch);

        $xmlParser = xml_parser_create();
        xml_parser_set_option($xmlParser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($xmlParser, $response2, $fields);

        $xml = simplexml_load_string($response2);
        $stext = $xml->count();
        $suggestions = array();


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
                }
            }
        }




        //file_put_contents($file, $suggestions);
        #return new Response('This is ajax',200);
        //$suggestions = array();
        //$suggestions[] = 'Perl';
        //$suggestions[] = 'Php';

        return new JsonResponse(array('suggestionsArray' => $suggestions, 'request' => $response2, 'fields' => $fields));
        #return $this->render('ComBundle:sqr:suggest.html.twig',array('form' => $form->createView()));
    }

}
