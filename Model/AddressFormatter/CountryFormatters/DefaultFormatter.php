<?php

namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\IAddressFormatter;

class DefaultFormatter implements IAddressFormatter {
    /**
     * @var Address
     */
    private $address;

    function __construct(Address $address) {
        $this->address = $address;
    }

    /**
     * The default layout of an address on the envelope
     * @inheritdoc
     */
    public function getFormattedAddress($options = array()) {
        /**
         * @todo to write
         */
        return "";
    }
} 