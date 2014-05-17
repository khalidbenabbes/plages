<?php

namespace test\formuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use test\formuleBundle\Entity\categorie;
use test\formuleBundle\Entity\produit;
use test\formuleBundle\Entity\task;
use test\formuleBundle\Entity\Marchand;
use test\formuleBundle\Form\taskType;
use test\formuleBundle\Form\MarchandType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class ProduitController extends Controller
{
     public function indexAction()
    {
         
         $categories=$this->getDoctrine()->getEntityManager()
         ->getRepository('testformuleBundle:categorie')
         ->findBy(array('categoris' => 1));
         
         $categorietop=array(array('nom' => ''));
         return $this->render('testformuleBundle:ProduitC:aside.html.twig',array('categories' => $categories,'categorietop' => $categorietop));
         
           }
          
          
    public function firstCategorieAction($id){
        
       $query = $this->getDoctrine()->getEntityManager()
        ->createQuery('
            SELECT c FROM testformuleBundle:categorie c
            WHERE  c.categoris= :id'
        )->setParameter('id','1');

      
     $categories=$query->getResult();
       if(!$query)
    {
      //throw $this->createNotFoundException('aucune categorie existante.');
           $categories=NULL;
    }
    
    //liste produit
    $queryp = $this->getDoctrine()->getEntityManager()
        ->createQuery('
        SELECT p FROM testformuleBundle:produit p
        WHERE  p.id = :id'
        )->setParameter('id',$id);
      
      $listequery=$queryp->getResult();
      
    
  return $this->render("testformuleBundle:ProduitC:contenu.html.twig",array('categories' => $categories,'produits' =>  $listequery ));
   
  }
    public function secondCategorieAction($id){
        
        $query = $this->getDoctrine()->getEntityManager()
        ->createQuery('
            SELECT c FROM testformuleBundle:categorie c
            WHERE  c.categoris= :id'
        )->setParameter('id',$id);
     
         $product = $this->getDoctrine()
        ->getRepository('testformuleBundle:categorie')
        ->find($id);
         $produits=$product->getProduits();
         
         /**** recuperer produit         */
         
         
    $query1 = $this->getDoctrine()->getEntityManager()
        ->createQuery('
            SELECT p, c FROM testformuleBundle:produit p
            JOIN p.categories c
            WHERE c.id = :id'
        )->setParameter('id', $id);
    
    //recuperer la liste des produits
    $em=$this->getDoctrine()->getEntityManager();
    $productsec = $em->getRepository('testformuleBundle:produit')
            ->findAll();
    
    
       $querytop = $this->getDoctrine()->getEntityManager()
        ->createQuery('
            SELECT c FROM testformuleBundle:categorie c
            where c.id= :id'
        )->setParameter('id', $id);
        

       //recuperer la premier categorie
       /*
       $em = $this->getDoctrine()->getEntityManager();
       $ca = $em->getRepository('testformuleBundle:categorie')
                      ->find($id);
       $liste_produit = $em->getRepository('testformuleBundle:produit')
                            ->findBy(array('categories' => $ca->getId()));
        * 
        * 
        */
   
      // $produits = $this->getDoctrine()->getEntityManager()->getRepository('testformuleBundle:produit')
        // $produits -> categories->            
       
      // $produit->addcategorie($categorie);
        
     //  $em = $this->getDoctrine()->getEntityManager();
       //$produits = $em->getRepository($produit)->find($id);
       
      $scategories = $query->getResult();
      $queryproduit = $query1->getResult();
      $querysingleresult  = $querytop->getResult();
     // $firstcategories=$query1->getResult();
       if(!$query)
    {
      //throw $this->createNotFoundException('aucune categorie existante.');
           $categories=NULL;
    }
       
      return $this->render("testformuleBundle:ProduitC:contenu.html.twig",array('categories' => $scategories,'produits' => $queryproduit,'categorietop' => $querysingleresult,'produitsec' => $productsec));
   
  }
  
  public function catAction(){
      
      $a = new task();
    	/*
         * $a = new noura();
         
    	$a->setTitre("bonjour")
          ->setDescription("ce chat est vraiment beau.")
          ->setUrl("http://www.journalduweb.fr/wp-content/uploads/2011/08/fond-ecran-chat-29.jpg")       
    	  ->setDate(new \DateTime());
       // il garde les traitements dans la memoire 
        $em->persist($a);
        $em->flush();
         */
        $form=$this->createForm(new \test\formuleBundle\Form\taskType(),$a);
        
        $request=$this->getRequest();
        if($request->getMethod() == 'POST'){
            $form->bindRequest($request);
           // var_dump($form);
           // exit();
            if($form ->isValid()){
            $a=$form->getData();
           return  new response($a->getName());
            }else{
                echo "ddd";
            }
        }
        
    	return $this->render('testformuleBundle:ProduitC:task.html.twig',array('form' => $form->createView(),'action' => "ajouter"));

      }
       // return $this->render('testformuleBundle:ProduitC:task.html.twig',array('form' => $form -> createView()));
  
  
  
  public function newAction(){
       $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

        $form = $this->createFormBuilder($task)
            ->add('task', 'text',array('required' => true))
            ->add('dueDate', 'date')
            ->add('name', 'text')
            ->getForm();

        return $this->render('testformuleBundle:ProduitC:task.html.twig', array(
            'form' => $form->createView(),
        ));
      
  }
  
  
  public function formAction(){
      $form = $this->createFormBuilder()

      ->add('pays', 'choice', array('choices' => array('fr' => 'France', 'ma' => 'Maroc' , 'es' => 'Espagne', 'uk' => 'Royaume Unis'), 'label' => 'Pays : '))


       ->add('ville', 'choice', array('empty_value' => '', 'required' => false, 'label' => 'Ville : ')) 


         ->getForm();
      
     return $this->render('testformuleBundle:ProduitC:form.html.twig',array('form' => $form->createView()));
      
      
  }
  
  public function ajaxrqAction(){
      $list_ville = array();
      $request = $this->container->get('request');
      if ($this->container->get('request')->isXmlHttpRequest()) {
          $id=$request->request->get('id');
          
         $ville= array('1' => 'khalid','2' => 'houda');
          foreach( $ville as $v => $k ){
              $list_ville[ $v ] = $v;
          }
          
          
          
        //Instancier une "réponse" grâce à l'objet "Response"

        $response = new Response(json_encode($list_ville));
        
        $response->headers->set('Content-Type', 'application/json');
       //Retourner la tout à notre liste déroulante

        return $response;
          
      }
      
      
  }
  
  public function userAction(){
      $a = new Marchand();
    	/*
         * $a = new noura();
         
    	$a->setTitre("bonjour")
          ->setDescription("ce chat est vraiment beau.")
          ->setUrl("http://www.journalduweb.fr/wp-content/uploads/2011/08/fond-ecran-chat-29.jpg")       
    	  ->setDate(new \DateTime());
       // il garde les traitements dans la memoire 
        $em->persist($a);
        $em->flush();
         */
      $em=$this->getDoctrine()->getEntityManager();
     
      $form=$this->createForm(new \test\formuleBundle\Form\MarchandType(),$a);
        
        $request=$this->getRequest();
        if($request->getMethod() == 'POST'){
            $form->bindRequest($request);
           // var_dump($form);
           // exit();
         
            if($form ->isValid()){
            $a=$form->getData();
            
           //recuperer les  informations d'inscription
           $nom=$a->getNom();
           $prenom=$a->getPrenom();
           $login=$a->getLogin();
           $pass=$a->getPassword();
           $url=$a->getUrl();
           $email=$a->getEmail();
 
          //insertion des informations d'inscription
           
           $a->setNom($nom);
           $a->setPrenom($prenom);
           $a->setLogin($login);
           $a->setPassword($pass);
           $a ->setUrl($url);
           $a->setEmail($email);
           $a->setActive(0);
           
           //persiter l table marchand
           
           $em->persist($a);
           $em->flush();
           
         return $this->redirect($this->generateUrl('categorie_p'));
            }else{
                echo "erreur d'insertion";
            }
        }
        
    	return $this->render('testformuleBundle:User:user.html.twig',array('form' => $form->createView(),'action' => "ajouter"));
  }
  
  public function prixAction($reference,$id){
      
      //return new Response($id." ".$prix);
      
    // $request = $this->container->get('request');

    
      $em = $this->getDoctrine()->getEntityManager();
      $qb = $em->createQueryBuilder();
      $result = $qb->select('n')->from('test\formuleBundle\Entity\produit', 'n')
      ->where( $qb->expr()->like('n.reference', $qb->expr()->literal('%' . $reference . '%')) )
      ->getQuery()
      ->getResult();
      
      $qb = $em->createQueryBuilder();
      $resultp = $qb->select('min(n.prix) as prix,n.reference as reference,n.image as image,m.login as login')->from('test\formuleBundle\Entity\produit', 'n')
                     ->innerJoin('n.marchand', 'm')
      ->where( $qb->expr()->like('n.reference', $qb->expr()->literal('%' . $reference . '%')) )
      ->getQuery()
      ->getSingleResult();
      
      
      /*
      $querytop = $this->getDoctrine()->getEntityManager()
        ->createQuery('
            SELECT min(p.prix) as prix,p.reference as reference,p.image as image,m.login as login FROM testformuleBundle:produit p
            JOIN p.marchand m
            WHERE p.reference like :ref'
        )->setParameter('ref','%' + $reference +  '%');
      
      $resultp  = $querytop->getResult();
      */
      
      
       return $this->renderView('testformuleBundle:ProduitC:test.html.twig',array('produits' => $result,'principale' => $resultp));
      
  }
  
  public function listAction(){
      
      $request = $this->container->get('request');
 $id=0;
 //$reference="ref3";
    if($request->isXmlHttpRequest())
    {
        $id= $request->request->get('id');
        $reference= $request->request->get('reference');
         $response = new Response($this->prixAction("$reference", $id));
         $response->headers->set('Content-Type', 'text/plain');
         return $response;
    }
  
 }
  

}  

