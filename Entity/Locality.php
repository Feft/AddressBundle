<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Feft\AddressBundle\Entity\Region;

/**
 * Locality
 */
class Locality
{
    /**
     * @var integer
     */
    private $id;

    /**
     * Locality name, eg. New York.
     * @var string
     */
    private $name;

    /**
     * Region.
     * @var Region
     */
    protected $region;


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
     * @return Locality
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
     * Set region
     *
     * @param Region $region
     * @return Locality
     */
    public function setRegion(Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }


    /**
     * Default implementation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
