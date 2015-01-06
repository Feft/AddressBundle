<?php

namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


use Feft\AddressBundle\Model\AddressFormatter\AddressFormatterInterface;

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
class DefaultFormatter extends AbstractFormatter implements AddressFormatterInterface
{
    /**
     * The default layout of an address on the envelope
     *
     * @param array $options Array of options - how to format address.
     * @return string
     */
    public function getEnvelopeFormattedAddress(array $options = array())
    {
        return
            $this->getAddress()->getStreet()->getName() . " " .
            $this->getAddress()->getNumber() . $this->config->getEndOfLine() .
            $this->getAddress()->getPostalCode()->getCode() . " " .
            $this->getAddress()->getLocality()->getName() .
            $this->getCountryName($options);
    }

    /**
     * The default layout of an address as inline string.
     *
     * @param array $options Array of options - how to format address.
     * @return string
     */
    public function getInlineFormattedAddress(array $options = array())
    {
        # adding line separator in $this->getCountryName method
        return $this->getAddress()->getStreet()->getName() . " " .
        $this->getAddress()->getNumber() . $this->config->getInLineAddressSectionSeparator() .
        $this->getAddress()->getPostalCode()->getCode() . " " .
        $this->getAddress()->getLocality()->getName() .
        $this->getCountryName($options);
    }

}
