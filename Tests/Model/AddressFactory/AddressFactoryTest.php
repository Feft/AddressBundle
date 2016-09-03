<?php


class AddressFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new \Feft\AddressBundle\Model\AddressFactory\AddressFactory();
    }

    public function testAddressFactoryInstance()
    {
        $this->assertInstanceOf("\Feft\AddressBundle\Model\AddressFactory\AddressFactory", $this->factory);
    }

    public function testGetAddressFromArray()
    {
        $array = array(
          "countryName" => "Poland",
            "countryAlpha2Code" => "PL",
            "countryLocalShortName" => "Polska",
            "localityName" => "Tychy",
            "regionName" => "śląskie",
            "streetName" => "Freedom",
            "postalCode" => "43-100",
            "streetNumber" => "20 m. 21",
        );

        $address = $this->factory->getAddressFromArray($array);

        $this->assertEquals("Poland", $address->getCountry()->getName());
        $this->assertEquals("PL", $address->getCountry()->getCode());
        $this->assertEquals("śląskie", $address->getRegion()->getName());
        $this->assertEquals("43-100", $address->getPostalCode()->getCode());
        $this->assertInstanceOf("\Feft\AddressBundle\Model\PostalValidator\PostalCodeValidatorInterface", $address->getPostalCode()->getValidator());
    }

}
 