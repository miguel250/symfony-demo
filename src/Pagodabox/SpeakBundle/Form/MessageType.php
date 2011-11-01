<?php

namespace Pagodabox\SpeakBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MessageType extends AbstractType
{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('message','text');
    }
     public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Pagodabox\SpeakBundle\Entity\Content',
        );
    }
    
    public function getName()
    {
    	return 'Message';
    }
}