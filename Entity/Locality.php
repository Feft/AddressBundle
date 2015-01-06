<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Feft\AddressBundle\Entity\Region;

/**
 * Locality
 *
 * @ORM\Table(name="locality")
 * @ORM\Entity
 */
class Locality
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
     * Locality name, eg. New York.
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * Region.
     *
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="localities")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
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
}
