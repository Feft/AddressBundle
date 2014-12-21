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
    /**
     * Config for formatter.
     * @var Config
     */
    protected $config;

    function __construct()
    {
        # formatter configuration
        $this->config = new Config();
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
            return $this->getLineEndString($options) .
            $country->getName();
        }
        return "";
    }

    /**
     * If format type is for envelope return line ending symbol (eg. \r\n)
     * No line ending if inline format type.
     *
     * @param array $options
     * @return string
     */
    private function getLineEndString(array $options = array())
    {
        # if no key in array
        if(false === array_key_exists('formatType',$options)) {
            return "";
        }

        if($options["formatType"] === "envelope") {
            return $this->config->getEndOfLine();
        }
        return "";
    }
}