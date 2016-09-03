<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Entity\Region;
use Feft\AddressBundle\Entity\Street;

/**
 * Address in international formats.
 *
 * For more information see:
 * @link http://www.bitboost.com/ref/international-address-formats.html#Formats
 *
 * @author Feft
 */
class Address
{
    /**
     * @var integer
     */
    private $id;


    /**
     * Country
     *
     * @var Country
     **/
    protected $country;


    /**
     * Region, subdivision, province.
     *
     * @var Region
     **/
    protected $region;


    /**
     * Locality: town, village
     *
     * @var Locality
     **/
    protected $locality;


    /**
     * Postal code, zip code.
     *
     * @var PostalCode
     **/
    protected $postalCode;

    /**
     * Name of the street. In this project its object.
     *
     * @var Street
     **/
    protected $street;


    /**
     * Street number and house number eg. 12/6 or 12 m. 6
     *
     * @var string
     */
    private $number;


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
     * Set street number
     *
     * @param string $number
     * @return Address
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get street number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set country
     *
     * @param Country $country
     * @return Address
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param Region $region
     * @return Address
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
     * Set locality
     *
     * @param Locality $locality
     * @return Address
     */
    public function setLocality(Locality $locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get Locality
     *
     * @return Locality
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set postalCode.
     * If you want to validate postal code, create new validator class (for your country).
     * @see Model/PostalValidator/PostalCodeValidatorInterface.php
     *
     * @param PostalCode $postalCode
     * @return Address
     */
    public function setPostalCode(PostalCode $postalCode = null)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return PostalCode
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * Set street
     *
     * @param Street $street
     * @return Address
     */
    public function setStreet(Street $street = null)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return Street
     */
    public function getStreet()
    {
        return $this->street;
    }
}
