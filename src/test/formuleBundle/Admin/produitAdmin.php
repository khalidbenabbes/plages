<?php
namespace test\formuleBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProduitAdmin extends Admin
{
     protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Produit')
                ->add('reference')
                ->add('prix',null,array('required' => false))
                ->add('image')
                ->add('categories')
                ->add('marchand')
               
                
                
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('reference')
            ->add('prix')
            ->add('image')
            ->add('categories')
            ->add('marchand')
            
          
            
    
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('reference')
            ->add('prix')
            ->add('image')
            ->add('categories')
            ->add('marchand')
           
            
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
            ->add('reference')
            ->add('prix')
            ->add('image')
            ->add('categories')
            ->add('marchand')
            

        ;
    }
    
    
    
}