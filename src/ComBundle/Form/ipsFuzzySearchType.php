<?php

/*
 * Copyright(c) 1993-2015 Softax, ksikora., Wszelkie prawa zastrzeżone
 * To oprogramowanie jest własnością i zawiera poufne technologie Softax.
 * Posiadanie, użycie lub kopiowanie tego oprogramowania jest dozwolone
 * jedynie na podstawie ważnej udzielonej pisemnie licencji Softax.
 */

/**
 * Description of ipsFilePost
 *
 * @author ksikora
 */
namespace ComBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\ChoiceList\ChoiceList;

class ipsFuzzySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('search', 'search');
        $builder->add('metric', 'number');
        $builder->add('submit', 'submit', array('label'=> 'submit.comIpsFuzzySearch', 'translation_domain' => 'messages'));
    }
    
    public function getName()
    {
        return 'IpsFuzzySearch';
    }
}
