<?php

namespace test\formuleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test\formuleBundle\Entity\produit
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="test\formuleBundle\Entity\produitRepository")
 */
class produit
{
    
    /**
     * @var integer $id
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
    private $id;

    /**
     * @var text $image
     *
     * @ORM\Column(name="image", type="text")
     */
    private $image;

    /**
     * @var string $reference
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var integer $prix
     *
     * @ORM\Column(name="prix", type="integer")
     */
    private $prix;
    
    
    /**
    * @var Marchand $marchand
    *
    * @ORM\ManyToOne(targetEntity="test\formuleBundle\Entity\Marchand", inversedBy="marchand")
    */
   Public $marchand;

    
   
     /**
      *  @var \Doctrine\Common\Collections\ArrayCollection $categories
     * @ORM\ManyToMany(targetEntity="test\formuleBundle\Entity\categorie", inversedBy="categories")
     **/
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
     * Set image
     *
     * @param text $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * Get image
     *
     * @return text 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set reference
     *
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Get reference
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * Get prix
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString(){
        return $this->reference;
    }
    
    

    /**
     * Add categories
     *
     * @param test\formuleBundle\Entity\categorie $categories
     */
    public function addcategorie(\test\formuleBundle\Entity\categorie $categories)
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

    /**
     * Set marchand
     *
     * @param test\formuleBundle\Entity\Marchand $marchand
     */
    public function setMarchand(\test\formuleBundle\Entity\Marchand $marchand)
    {
        $this->marchand = $marchand;
    }

    /**
     * Get marchand
     *
     * @return test\formuleBundle\Entity\Marchand 
     */
    public function getMarchand()
    {
        return $this->marchand;
    }
}