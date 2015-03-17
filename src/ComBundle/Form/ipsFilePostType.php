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

class ipsFilePostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('fileId', 'text');
        $builder->add('randomizeId', 'checkbox', array(
            'label'     => 'random.comIpsFilePost',
            'translation_domain' => 'messages',
            'required'  => false,
        ));
        $builder->add('fileType', 'text');
        $builder->add('fileFmt', 'choice', array(
  'choice_list' => new ChoiceList(array(1), array('plain'))
));
        $builder->add('fileData', 'textarea');
        $builder->add('submit', 'submit', array('label'=> 'submit.comIpsFilePost', 'translation_domain' => 'messages'));
        
    }
    
    public function getName()
    {
        return 'IpsFilePost';
    }
}
