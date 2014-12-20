<?php
namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;

/**
 * Polish version of address format on envelope.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter\CountryFormatters
 */
class PL extends DefaultFormatter {

    /**
     * Polish version, for example:
     *  Pl. Malachowskiego 2
     *  00-940 WARSZAWA
     *  POLAND
     *
     *
     * @link http://www.bitboost.com/ref/international-address-formats/poland/
     * @inheritdoc
     */
    public function getEnvelopeFormattedAddress(array $options = array())
    {
        return
            $this->getAddress()->getStreet()->getName()." ".
            $this->getAddress()->getNumber()."\r\n".
            $this->getAddress()->getPostalCode()->getCode()." ".
            $this->getAddress()->getLocality()->getName().
            $this->getCountryName($options)
        ;
    }
}