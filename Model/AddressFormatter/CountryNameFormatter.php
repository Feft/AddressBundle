<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

use Feft\AddressBundle\Entity\Country;

/**
 * Class for formatting country name in formatter.
 * If you send showCountryName option and formatType is envelope
 * you will get string: PHP_EOL.countryName.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter
 */
class CountryNameFormatter {

    public function __construct()
    {
    }

    /**
     * Add to country name end of line symbol.
     *
     * @param Country $country
     * @param array $options
     * @return string
     */
    public function getFormattedCountryName(Country $country, array $options = array())
    {
        # if no key in array
        if(false === array_key_exists('showCountryName',$options)) {
            return "";
        }
        # if the country name should be show
        if(true === $options["showCountryName"]) {
            $lineEndCreator = new EndOfLineCreator();
            return $lineEndCreator->generateEndOfLineString($options, new Config()) .
            $country->getName();
        }
        return "";
    }
}