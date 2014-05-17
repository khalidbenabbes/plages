<?php

namespace test\formuleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class taskType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('task','text')
            ->add('dueDate','date')
            ->add('name','text')    
        ;
    }

    public function getName()
    {
        return 'dd';
    }
}
