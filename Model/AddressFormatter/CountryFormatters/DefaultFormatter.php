<?php

namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\IAddressFormatter;

/**
 * Default methods for address format.
 *
 * Default format for envelope:
 *   [street address (street name + house/building number)]
 *   [postal code + city/town/locality]
 *   [country name, when mailing from outside the country]
 *
 * Default format inline formatting:
 *   [postal code + city/town/locality], [street address (street name + house/building number)], [country name]
 *
 * @package Feft\AddressBundle\Model\AddressFormatter\CountryFormatters
 */
class DefaultFormatter implements IAddressFormatter {
    /**
     * Address to format.
     * @var Address
     */
    protected $address;

    /**
     * Line ending codes.
     * @var string
     */
    protected $defaultLineEnding;

    /**
     * Default address section separator.
     * Use in inline formatter.
     *
     * @var string
     */
    protected $inLineAddressSectionSeparator;

    function __construct(Address $address) {
        $this->address = $address;

        # formatter configuration
        $this->setFormatterConfiguration();
    }

    /**
     * Set formatter configuration for formatter.
     */
    protected function setFormatterConfiguration()
    {
        $this->defaultLineEnding = "\r\n";
        $this->inLineAddressSectionSeparator = ", ";
    }

    /**
     * The default layout of an address on the envelope
     *
     * @param array $options Array of options - how to format address.
     * @return string
     */
    public function getEnvelopeFormattedAddress(array $options = array()) {
        return
            $this->getAddress()->getStreet()->getName()." ".
            $this->getAddress()->getNumber() . $this->defaultLineEnding .
            $this->getAddress()->getPostalCode()->getCode()." ".
            $this->getAddress()->getLocality()->getName().
            $this->getCountryName($options)
            ;
    }

    /**
     * The default layout of an address as inline string.
     *
     * @param array $options Array of options - how to format address.
     * @return string
     */
    public function getInlineFormattedAddress(array $options = array()) {

        $countryName = $this->getCountryName($options);
        if(strlen($countryName) > 0) {
            $countryName = $this->inLineAddressSectionSeparator . $countryName;
        }

        return $this->getAddress()->getStreet()->getName()." ".
            $this->getAddress()->getNumber(). $this->inLineAddressSectionSeparator .
            $this->getAddress()->getPostalCode()->getCode()." ".
            $this->getAddress()->getLocality()->getName().
            $countryName;
    }

    /**
     * Add country name (and prefix: new line) to the address if options showCountryName is true.
     *
     * @param array $options array options
     * @return string
     */
    protected function getCountryName($options)
    {
        $countryName = "";
        if(array_key_exists('showCountryName',$options)) {
            if($options["showCountryName"] === true) {
                $countryName = $this->getLineEndString($options).
                    $this->getAddress()->getCountry()->getName();
            }
        }
        return $countryName;
    }

    /**
     * If format type is for envelope return line ending code (\r\n)
     * No line ending if inline format type.
     *
     * @param array $options
     * @return string
     */
    protected function getLineEndString(array $options = array())
    {
        $lineEnding = "";
        if(array_key_exists('formatType',$options)) {
            if($options["formatType"] === "envelope") {
                $lineEnding = $this->defaultLineEnding;
            }
        }
        return $lineEnding;
    }

    /**
     * Get address.
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }


} 
