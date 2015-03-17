<?php
namespace ComBundle\Utils;
/* 
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */
use Symfony\Component\DependencyInjection\SimpleXMLElement;
class XML extends SimpleXMLElement
{
        
        function __construct($root) {
            $string = '<'.$root.'>'.'</'.$root.'>';
            parent::__construct($string,0,false,"",false);
        }
        
}