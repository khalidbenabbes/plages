<?php

namespace test\formuleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test\formuleBundle\Entity\categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="test\formuleBundle\Entity\categorieRepository")
 */
class categorie
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    
   /**
    * @var categorie $categoris
    *
    * @ORM\ManyToOne(targetEntity="test\formuleBundle\Entity\categorie", inversedBy="categorie")
    */
Public $categoris;


    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    
 /**
  * @var \Doctrine\Common\Collections\ArrayCollection $produits
  * 
  * @ORM\ManyToMany(targetEntity="test\formuleBundle\Entity\produit" , inversedBy="$produits")
     *
     */
    protected $produits;


    
  
    
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
     * Set nom
     *
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }
    
     public function __toString(){
        return $this->nom;
    }

   
    public function __construct()
    {
        $this->produits = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add produits
     *
     * @param test\formuleBundle\Entity\produit $produits
     */
    public function addproduit(\test\formuleBundle\Entity\produit $produits)
    {
        $this->produits[] = $produits;
    }

    /**
     * Get produits
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProduits()
    {
        return $this->produits;
    }

  

    /**
     * Set categoris
     *
     * @param test\formuleBundle\Entity\categorie $categoris
     */
    public function setCategoris(\test\formuleBundle\Entity\categorie $categoris)
    {
        $this->categoris = $categoris;
    }

    /**
     * Get categoris
     *
     * @return test\formuleBundle\Entity\categorie 
     */
    public function getCategoris()
    {
        return $this->categoris;
    }
}