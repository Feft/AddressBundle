<?php

namespace Feft\AddressBundle\Entity;

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
     * Province in the country.
     * 
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
     * Get local short name of the country.
     * @return string
     */
    public function getLocalShortName()
    {
        return $this->localShortName;
    }

    /**
     * Set local short name of the country.
     * @param string $localShortName
     */
    public function setLocalShortName($localShortName)
    {
        $this->localShortName = $localShortName;
    }

    /**
     * Get country code, eg. US, PL
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set country code.
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }


    /**
     * Add regions
     *
     * @param \Feft\AddressBundle\Entity\Region $region
     * @return Country
     */
    public function addRegion(\Feft\AddressBundle\Entity\Region $region)
    {
        $this->regions[] = $region;

        return $this;
    }

    /**
     * Remove regions
     *
     * @param \Feft\AddressBundle\Entity\Region $region
     */
    public function removeRegion(\Feft\AddressBundle\Entity\Region $region)
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
