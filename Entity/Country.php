<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country.
 * Partial implementation of the ISO 3166 standard extended to the region,
 * eg. in US we have Alabama,Texas regions.
 *
 * @link http://www.iso.org/iso/country_codes.htm
 * @link http://en.wikipedia.org/wiki/ISO_3166
 */
class Country
{
    /**
     * @var integer
     */
    private $id;
    /**
     * Short name from ISO 3166 — Codes for the representation of names of countries and their subdivisions,
     * eg. Poland.
     *
     * @var string
     */
    private $name;
    /**
     * Local short name eg. "Polska" or "United States (the)"
     *
     * @var string
     */
    private $localShortName;
    /**
     * Alpha-2 code country
     * @link http://www.iso.org/iso/country_codes.htm
     * @var string
     */
    private $code;

    /**
     * Province in the country.
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
     * @return $this
     */
    public function setLocalShortName($localShortName)
    {
        $this->localShortName = $localShortName;
        return $this;
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
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Add region to the country.
     *
     * @param Region $region Region of the country to join
     * @return Country
     */
    public function addRegion(Region $region)
    {
        $this->regions[] = $region;

        return $this;
    }

    /**
     * Remove region from the country
     *
     * @param Region $region
     */
    public function removeRegion(Region $region)
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
