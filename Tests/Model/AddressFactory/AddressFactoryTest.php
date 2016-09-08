<?php


class AddressFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    private $data;

    public function setUp()
    {
        $this->factory = new \Feft\AddressBundle\Model\AddressFactory\AddressFactory();


        $this->data = array(
            "countryName" => "Poland",
            "countryAlpha2Code" => "PL",
            "countryLocalShortName" => "Polska",
            "localityName" => "Tychy",
            "regionName" => "śląskie",
            "streetName" => "Freedom",
            "postalCode" => "43-100",
            "streetNumber" => "20 m. 21",
        );
    }

    public function testAddressFactoryInstance()
    {
        $this->assertInstanceOf("\Feft\AddressBundle\Model\AddressFactory\AddressFactory", $this->factory);
    }

    public function testGetAddressFromArray()
    {
        $address = $this->factory->getAddressObject($this->data);
        $this->assert($address);
    }

    public function testGetAddressFromJson()
    {
        $jsonData = json_encode($this->data);

        $address = $this->factory->getAddressObject($jsonData);
        $this->assert($address);
    }

    public function testGetAddressFromBadData()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $address = $this->factory->getAddressObject("some string data");
    }


    private function assert($address)
    {
        $this->assertEquals("Poland", $address->getCountry()->getName());
        $this->assertEquals("PL", $address->getCountry()->getCode());
        $this->assertEquals("śląskie", $address->getRegion()->getName());
        $this->assertEquals("43-100", $address->getPostalCode()->getCode());
        $this->assertInstanceOf("\Feft\AddressBundle\Model\PostalValidator\PostalCodeValidatorInterface", $address->getPostalCode()->getValidator());
    }

}
 