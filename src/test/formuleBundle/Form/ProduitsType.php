<?php

namespace test\formuleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProduitsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('price')
            ->add('categorie')
        ;
    }

    public function getName()
    {
        return 'test_formulebundle_produitstype';
    }
}
