<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\DefaultFormatter;

/**
 * Factory - create concrete formatter object
 * from country alpha2code string.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter
 */
class Factory {
    /**
     * Factory - create concrete formatter object
     * from country alpha2code string.
     *
     * @param Address $address
     * @return DefaultFormatter
     */
    public function getInstance(Address $address)
    {
        /**
         * @todo - error if no country in address object
         */
        $country = $address->getCountry();

        # get country code
        if(is_object($country)) {
            $countryAlpha2Code = $country->getCode();
        } else {
            $countryAlpha2Code = '';
        }

        $formatterName = __NAMESPACE__ . '\\CountryFormatters\\' . $countryAlpha2Code ;

        # if file exists in CountryFormatters folder
        if(class_exists($formatterName)) {
            return new $formatterName($address);
        } else {
            return new DefaultFormatter($address);
        }
    }
}