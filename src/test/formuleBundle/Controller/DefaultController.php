<?php

namespace test\formuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        //return $this->render('testformuleBundle:Default:index.html.twig', array('name' => $name));
        return $this->render('testformuleBundle:Default:index.html.twig');
      //  return $this->render('testformuleBundle:Default:index.html.twig', array('xy' => "52.3731, 4.8922"));
    }
    
      public function listPlagesAction()
    {
        return $this->render('testformuleBundle:Default:listPlages.html.twig', array('xy' => "30.42775, -9.59811"));
          
    }
}
