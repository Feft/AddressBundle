<?php
namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;


use Feft\AddressBundle\Entity\Address;

class PL extends DefaultFormatter {

    /**
     * Polish version, for example:
     *  Poste Polonaise
     *  Direction générale - example
     *  Bureau du trafic international
     *  Pl. Malachowskiego 2
     *  00-940 WARSZAWA
     *  POLAND
     * @link http://www.bitboost.com/ref/international-address-formats/poland/
     * @inheritdoc
     */
    public function getFormattedAddress($options = array())
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