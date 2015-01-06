<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;

/**
 * This class returns address formatted for envelope.
 *
 * Helper for Twig.
 * @package Feft\AddressBundle\Helper
 */
class EnvelopeAddressFormatter extends AddressFormatter implements AddressFormatterHelperInterface
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
        # return formatter for country
        $formatter = $this->getFactoryInstance($address);
        $options["formatType"] = 'envelope';
        return nl2br($formatter->getEnvelopeFormattedAddress($options));
    }

}
