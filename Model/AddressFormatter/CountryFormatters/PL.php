<?php
namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


class PL extends DefaultFormatter {

    /**
     * Polish version.
     * @link http://www.bitboost.com/ref/international-address-formats/poland/
     * @inheritdoc
     */
    public function getFormattedAddress($options = array())
    {
        return "adres po polsku";
    }

} 