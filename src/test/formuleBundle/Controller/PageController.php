<?php

namespace test\formuleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use test\formuleBundle\Entity\Article;
use test\formuleBundle\Entity\Commentaire;
use Symfony\Component\HttpFoundation\Session\Session;


class PageController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('testformuleBundle:Default:index.html.twig');
    }
    
    public function ajouterAction(){
        
    // Création d'un premier Article
    $article = new Article();
    $article->setTitre('Mon dernier weekend');
    $article->setContenu("C'était vraiment super et on s'est bien amusé.");
    $article->setAuteur('winzou');
        
         // Création d'un premier commentaire
    $commentaire1 = new Commentaire();
    $commentaire1->setAuteur('winzou');
    $commentaire1->setContenu('On veut les photos !');
    
    // On lie les commentaires à l'article
    $commentaire1->setArticle($article);
    
 
    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getEntityManager();
 
    // Étape 1 : On persiste les entités
    $em->persist($article);
    // Pour cette relation pas de cascade, car elle est définie dans l'entité Commentaire et non Article
    // On doit donc tout persister à la main ici
    $em->persist($commentaire1);
  
 
    // Étape 2 : On déclenche l'enregistrement
    $em->flush();
 
    return $this->render('testformuleBundle:Blog:voir.html.twig');
    
    }
    
    
    public function voirAction($id){
        // On récupère l'EntityManager
 
       $em=$this->getDoctrine()->getEntityManager();
       $article=$em->getRepository("testformuleBundle:Article")->find($id);
    
    if($article === null)
    {
      throw $this->createNotFoundException('Article[id='.$id.'] inexistant.');
    }
    
    // On récupère la liste des commentaires
    $liste_commentaires = $em->getRepository('testformuleBundle:Commentaire')
                             ->findAll();
    // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
    return $this->render('testformuleBundle:Default:index.html.twig', array(
      'article'  => $article,
      'liste_commentaires' => $liste_commentaires
    ));
        
    }
   
   public function findbyauteurAction(){
      $em = $this->getDoctrine()->getEntityManager();
$query = $em->createQuery(
    'SELECT a FROM testformuleBundle:Article a,testformuleBundle:Commentaire c WHERE c.article = a.id and a.id > :id ORDER BY a.titre ASC'
)->setParameter('id', '3');

$querycom = $em->createQuery(
    'SELECT c FROM testformuleBundle:Article a,testformuleBundle:Commentaire c WHERE c.article = a.id and a.id = :id ORDER BY a.titre ASC'
)->setParameter('id',3);

$comm = $querycom->getResult();
$article= $query->getResult();


$session  = $this->get("session");
//$session->start();
// définit et récupère des attributs de session
//$session->set('infor', 'Drak');

$this->get('session')->setFlash(
                 'warning',
                 'Password Updated Successfully'
                  );


return $this->render('testformuleBundle:Default:index.html.twig', array(
      'article'  => $article,
      'liste_commentaires' => $comm
    ));

   }
}
