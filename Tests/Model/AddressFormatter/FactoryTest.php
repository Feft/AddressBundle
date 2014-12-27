<?php

class FactoryTest extends PHPUnit_Framework_TestCase {

    private $address;
    private $factory;

    function setUp() {
        $this->address = new \Feft\AddressBundle\Entity\Address();
        $this->factory = new \Feft\AddressBundle\Model\AddressFormatter\Factory();
    }

    public function testNoCountryInAddress() {
        $formatter = $this->factory->getInstance($this->address);
        $this->assertInstanceOf(
            "\Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\DefaultFormatter",
            $formatter);
    }

    /**
     *
     */
    public function testPLCountryInAddress() {
        $country = new \Feft\AddressBundle\Entity\Country("Poland","PL");
        $this->address->setCountry($country);
        $formatter = $this->factory->getInstance($this->address);

        $this->assertInstanceOf(
            "\Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\DefaultFormatter",
            $formatter);
    }


}
 