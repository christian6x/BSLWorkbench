<?php

namespace ComBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ipsSquareSuggestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('search', 'search');
        $builder->add('submit', 'submit', array('label'=> 'submit.suggest', 'translation_domain' => 'messages'));
        
    }
    
    public function getName()
    {
        return 'IpsSquareSuggest';
    }
}


