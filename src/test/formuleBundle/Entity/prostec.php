<?php

namespace test\formuleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test\formuleBundle\Entity\prostec
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="test\formuleBundle\Entity\prostecRepository")
 */
class prostec
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
    * @var proste $proste
    * @ORM\OneToMany(targetEntity="test\formuleBundle\Entity\proste", mappedBy="poste")
    */
    private $proste;
    

    /**
     * @var string $nom
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;


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
    public function __construct()
    {
        $this->proste = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add proste
     *
     * @param orion\BlogBundle\Entity\Commentaire $proste
     */
    public function addCommentaire(\orion\BlogBundle\Entity\Commentaire $proste)
    {
        $this->proste[] = $proste;
    }

    /**
     * Get proste
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getProste()
    {
        return $this->proste;
    }

    /**
     * Add proste
     *
     * @param test\formuleBundle\Entity\proste $proste
     */
    public function addproste(\test\formuleBundle\Entity\proste $proste)
    {
        $this->proste[] = $proste;
    }
    
    public function __toString() {
    return "$this->nom";
}
}