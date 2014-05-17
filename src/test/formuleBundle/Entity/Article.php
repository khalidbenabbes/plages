<?php

namespace test\formuleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test\formuleBundle\Entity\Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="test\formuleBundle\Entity\ArticleRepository")
 */
class Article
{
    
    public function __construct()
  {
    // Si vous aviez déjà un constructeur, ajoutez juste cette ligne :
     $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
  }
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var text $contenu
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var string $auteur
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    private $auteur;
    
    
    /**
   * @ORM\ManyToMany(targetEntity="test\formuleBundle\Entity\Categorie", cascade={"persist"})
   */
  private $categories;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param text $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * Get contenu
     *
     * @return text 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set auteur
     *
     * @param string $auteur
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
    }

    /**
     * Get auteur
     *
     * @return string 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add categories
     *
     * @param test\formuleBundle\Entity\Categorie $categories
     */
    public function addCategorie(\test\formuleBundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;
    }

    /**
     * Get categories
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}