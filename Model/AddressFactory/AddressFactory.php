<?php
namespace Feft\AddressBundle\Model\AddressFactory;

use Feft\AddressBundle\Entity\Address;

/**
 * Create complete address object from: array, json.
 *
 */
class AddressFactory {

    /**
     * Get complete Address object from array (eg. from POST).
     * Required values: countryName, countryAlpha2Code, countryLocalShortName, localityName, regionName, streetName, streetNumber, postalCode.
     *
     * @param $data mixed Address data for builder
     *
     * @return Address Address object
     */
    public function getAddressObject($data)
    {
        $factory = new AddressBuilderFactory();
        $builder = $factory->getInstance($data);
        return $builder->build($data);
    }
} 