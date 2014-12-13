<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\DefaultFormatter;

class Factory {
    /**
     * @param Address $address
     * @return DefaultFormatter
     */
    public function getInstance(Address $address)
    {
        $country = $address->getCountry();
        if(is_object($country)) {
            $countryAlpha2Code = $country->getCode();
        } else {
            $countryAlpha2Code = '';
        }

        $formatterName = __NAMESPACE__ . '\\CountryFormatters\\' . $countryAlpha2Code ;

        if(class_exists($formatterName)) {
            return new $formatterName($address);
        } else {
            return new DefaultFormatter($address);
        }
    }
}