<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Region
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="regions")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * @var Country;
     */
    protected $country;


    /**
     * @ORM\OneToMany(targetEntity="Locality", mappedBy="region")
     * @var Locality
     */
    protected $localities;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->localities = new ArrayCollection();
    }


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
     * @return Region
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set country
     *
     * @param \Feft\AddressBundle\Entity\Country $country
     * @return Region
     */
    public function setCountry(\Feft\AddressBundle\Entity\Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Feft\AddressBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * Add localities
     *
     * @param \Feft\AddressBundle\Entity\Locality $locality
     * @return Region
     */
    public function addLocality(\Feft\AddressBundle\Entity\Locality $locality)
    {
        $this->localities[] = $locality;

        return $this;
    }

    /**
     * Remove localities
     *
     * @param \Feft\AddressBundle\Entity\Locality $locality
     */
    public function removeLocality(\Feft\AddressBundle\Entity\Locality $locality)
    {
        $this->localities->removeElement($locality);
    }

    /**
     * Get localities
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocalities()
    {
        return $this->localities;
    }
}
