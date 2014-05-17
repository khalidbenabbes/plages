<?php

namespace test\formuleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MarchandType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('login')
            ->add('password')
            ->add('url','url')
            ->add('email','email')
            ->add('Active')
        ;
    }

    public function getName()
    {
        return 'test_formulebundle_produitstype';
    }
}
