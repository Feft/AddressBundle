<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;

/**
 * Interface for all address formatter.
 *
 * @package Feft\AddressBundle\Helper
 */
interface AddressFormatterHelperInterface {
    /**
     * Get formatted address.
     *
     * @param Address $address Address to format
     * @param array $options Formatting options
     * @return string
     */
    public function getFormattedAddress(Address $address, array $options = array());
}