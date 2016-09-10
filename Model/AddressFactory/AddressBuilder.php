<?php

namespace Feft\AddressBundle\Model\AddressFactory;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Entity\Region;
use Feft\AddressBundle\Entity\Street;
use Feft\AddressBundle\Model\PostalValidator\Factory;

/**
 * Abstract Address Builder class - common function
 * Data required values: countryName, countryAlpha2Code, countryLocalShortName, localityName, regionName, streetName, streetNumber, postalCode.
 *
 */
class AddressBuilder implements AddressBuilderInterface
{

    /**
     * Address object generate from data, eg. from array (like $_POST).
     * Required values: countryName, countryAlpha2Code, countryLocalShortName, localityName, regionName, streetName, streetNumber, postalCode.
     *
     * @param $data array Address data for builder
     *
     * @throws \InvalidArgumentException if no array parameter
     *
     * @return Address Address object
     */
    public function build($data)
    {
        if (!is_array($data)) {
            throw new \InvalidArgumentException();
        }

        return $this->buildFromArray($data);
    }

    /**
     * Get complete Address object from array (eg. from POST).
     *
     * @param array $array Array of address string (key => value).
     *
     * @return Address
     */
    protected function buildFromArray(array $array)
    {
        $address = new Address();
        $country = new Country($array["countryName"], $array["countryAlpha2Code"]);
        $country->setLocalShortName($array["countryLocalShortName"]);
        $address->setCountry($country);

        $locality = new Locality();
        $locality->setName($array["localityName"]);

        $region = new Region();
        $region->setName($array["regionName"]);
        $locality->setRegion($region);
        $country->addRegion($locality->getRegion());
        $locality->getRegion()->setCountry($country);

        $street = new Street();
        $street->setName($array["streetName"]);

        $code = new PostalCode();
        $code->setCode($array["postalCode"]);
        $code->setValidator(Factory::getInstance($code, $country->getCode()));

        # add country to address
        $address->setCountry($country);
        #add region to address
        $address->setRegion($region);
        # add locality (city) to address
        $address->setLocality($locality);
        # add street to address
        $address->setStreet($street);
        # add street number to address
        $address->setNumber($array["streetNumber"]);
        # add zip to address
        $address->setPostalCode($code);

        return $address;
    }
}