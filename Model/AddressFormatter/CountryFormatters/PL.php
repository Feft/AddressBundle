<?php
namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


class PL extends DefaultFormatter {

    /**
     * Polish version, for example:
     *  Poste Polonaise
        Direction générale - example
        Bureau du trafic international
        Pl. Malachowskiego 2
        00-940 WARSZAWA
        POLAND
     * @link http://www.bitboost.com/ref/international-address-formats/poland/
     * @inheritdoc
     */
    public function getFormattedAddress($options = array())
    {
        return "
            Poste Polonaise
            Direction générale - example
            Bureau du trafic international
            Pl. Malachowskiego 2
            00-940 WARSZAWA
            POLAND
        ";
    }

} 