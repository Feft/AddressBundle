<?php

namespace Nodus\SuperPrzedszkoleBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Country.
 * Partial implementation of the ISO 3166 standard extended to the region,
 * eg. in US we have Alabama,Texas regions.
 *
 * @link http://www.iso.org/iso/country_codes.htm
 * @link http://en.wikipedia.org/wiki/ISO_3166
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
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
     * Short name from ISO 3166 — Codes for the representation of names of countries and their subdivisions
     *
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=40)
     */
    private $name;
    /**
     * Local short name eg. "Polska" or "United States (the)"
     *
     * @var string
     * @ORM\Column(name="local_short_name", type="string", length=40, nullable=true)
     */
    private $localShortName;
    /**
     * Alpha-2 code country
     * @link http://www.iso.org/iso/country_codes.htm
     * @var string
     *
     * @ORM\Column(name="alpha_2_code", type="string", length=2, nullable=true)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="Region", mappedBy="country")
     * @var ArrayCollection
     */
    protected $regions;

    public function __construct($name = null, $alpha_2_code = null)
    {
        $this->setName($name);
        $this->setCode($alpha_2_code);
        $this->regions = new ArrayCollection();
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocalShortName()
    {
        return $this->localShortName;
    }

    /**
     * @param string $localShortName
     */
    public function setLocalShortName($localShortName)
    {
        $this->localShortName = $localShortName;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


    /**
     * Add regions
     *
     * @param \Nodus\SuperPrzedszkoleBundle\Entity\Region $region
     * @return Country
     */
    public function addRegion(\Nodus\SuperPrzedszkoleBundle\Entity\Region $region)
    {
        $this->regions[] = $region;

        return $this;
    }

    /**
     * Remove regions
     *
     * @param \Nodus\SuperPrzedszkoleBundle\Entity\Region $region
     */
    public function removeRegion(\Nodus\SuperPrzedszkoleBundle\Entity\Region $region)
    {
        $this->regions->removeElement($region);
    }

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegions()
    {
        return $this->regions;
    }
}
