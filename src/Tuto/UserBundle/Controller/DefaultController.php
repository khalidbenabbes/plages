<?php

namespace Tuto\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('TutoUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
