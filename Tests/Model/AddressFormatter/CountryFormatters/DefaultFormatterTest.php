<?php

use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Entity\Region;
use Feft\AddressBundle\Entity\Street;
use Feft\AddressBundle\Model\PostalValidator\Factory;

class DefaultFormatterTest extends PHPUnit_Framework_TestCase {
    private $address;
    private $factory;
    private $formatter;

    function setUp() {
        $this->address = new \Feft\AddressBundle\Entity\Address();

        $country = new Country("Poland","PL");
        $country->setLocalShortName("Polska");

        $locality = new Locality();
        $locality->setName("Tychy");

        $region = new Region();
        $region->setName("śląskie");
        $locality->setRegion($region);
        $country->addRegion($locality->getRegion());
        $locality->getRegion()->setCountry($country);

        $street = new Street();
        $street->setName("Wolności");

        $code = new PostalCode();
        $code->setCode("43-100");
        $code->setValidator(Factory::getInstance($code,$country->getCode()));

        $this->address->setCountry($country);
        $this->address->setRegion($region);
        $this->address->setLocality($locality);
        $this->address->setStreet($street);
        $this->address->setNumber("20 m. 21");
        $this->address->setPostalCode($code);


        $this->factory = new \Feft\AddressBundle\Model\AddressFormatter\Factory();

        $this->formatter = $this->factory->getInstance($this->address);
    }

    public function testFormatterInstance()
    {
        $this->assertInstanceOf(
            "\Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\AbstractFormatter",
            $this->formatter
        );
    }

    public function testGetInlineFormattedAddress()
    {
        $string = $this->formatter->getInlineFormattedAddress(array());

        $this->assertNotContains(PHP_EOL,$string);
    }

    public function testGetInlineFormattedAddressWithCountryName()
    {
        $options["showCountryName"] = true;
        $options["formatType"] = 'inline';
        $string = $this->formatter->getInlineFormattedAddress($options);

        $this->assertContains(", Poland",$string);
    }


    public function testGetEnvelopeFormattedAddress()
    {
        $string = $this->formatter->getEnvelopeFormattedAddress(array());

        $this->assertContains(PHP_EOL,$string);

        $this->assertStringStartsWith("Wolności",$string);
        $this->assertContains("20 m. 21",$string);
        # no option so no country name
        $this->assertNotContains("Poland",$string);
    }


}
