<?php
namespace test\formuleBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PosteAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('General')
                
                ->add('name',null, array('required' => false))
                ->add('price')
                ->add('prostec')
                ->setHelps(array(
               'name' => $this->trans('nom de produit')))
          
                
                
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('price')
             ->add('prostec')
          
            
    
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('price') 
            ->add('prostec')
            
            ->add('_action','actions',array(
                  'actions' => array(
                      'edit' => array(),
                  )
            ))
        ;
    }
    
    public function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('price')
            ->add('prostec')

        ;
    }

    
    
}