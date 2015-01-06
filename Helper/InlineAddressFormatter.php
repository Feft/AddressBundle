<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;

/**
 * This class returns inline formatted string.
 *
 * Helper for Twig.
 * @package Feft\AddressBundle\Helper
 */
class InlineAddressFormatter extends AddressFormatter implements AddressFormatterHelperInterface
{
    /**
     * Get formatted address.
     * For more information see:
     * @link http://www.bitboost.com/ref/international-address-formats.html#Formats
     *
     * @param Address $address Address to show
     * @param array $options Formatting options
     * @return string
     */
    public function getFormattedAddress(Address $address, array $options = array())
    {
        $formatter = $this->getFactoryInstance($address);
        $options["formatType"] = 'inline';
        return $formatter->getInlineFormattedAddress($options);
    }

}
