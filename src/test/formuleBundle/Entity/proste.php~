<?php

namespace test\formuleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * test\formuleBundle\Entity\proste
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="test\formuleBundle\Entity\prosteRepository")
 */
class proste
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $price
     *
     * @ORM\Column(name="price", type="integer")
     */
    private $price;
    
    
    /**
    * @var prostec $prostec
    *
    * @ORM\ManyToOne(targetEntity="test\formuleBundle\Entity\prostec", inversedBy="prostec")
    */
    public $prostec;
    

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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param integer $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return integer 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set prostec
     *
     * @param test\formuleBundle\Entity\prostec $prostec
     */
    public function setProstec(\test\formuleBundle\Entity\prostec $prostec)
    {
        $this->prostec = $prostec;
    }

    /**
     * Get prostec
     *
     * @return test\formuleBundle\Entity\prostec 
     */
    public function getProstec()
    {
        return $this->prostec;
    }
    
 public function __toString() {
    return $this->prostec;
}
    
}