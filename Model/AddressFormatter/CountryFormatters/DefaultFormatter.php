<?php

namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\IAddressFormatter;

class DefaultFormatter implements IAddressFormatter {
    /**
     * @var Address
     */
    protected $address;

    function __construct(Address $address) {
        $this->address = $address;
    }

    /**
     * The default layout of an address on the envelope
     *
     */
    public function getFormattedAddress($options = array()) {
        /**
         * @todo to write
         */
        return "my default formatted address";
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
                $countryName = "\r\n".$this->getAddress()->getCountry()->getName();
            }
        }
        return $countryName;
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