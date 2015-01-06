<?php

namespace Feft\AddressBundle\Tests;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Entity\Region;
use Feft\AddressBundle\Entity\Street;
use Feft\AddressBundle\Helper\EnvelopeAddressFormatter;
use Feft\AddressBundle\Model\PostalValidator\Factory;

class EnvelopeAddressFormatterTest extends \PHPUnit_Framework_TestCase
{
    private $address;

    function setUp()
    {
        $this->address = new Address();

        $country = new Country("Poland", "PL");
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
        $code->setValidator(Factory::getInstance($code, $country->getCode()));

        $this->address->setCountry($country);
        $this->address->setRegion($region);
        $this->address->setLocality($locality);
        $this->address->setStreet($street);
        $this->address->setNumber("20 m. 21");
        $this->address->setPostalCode($code);
    }

    public function testGetFormattedAddress()
    {
        $helper = new EnvelopeAddressFormatter();
        $string = $helper->getFormattedAddress($this->address, array());
        # method use nl2br function
        $this->assertContains("<br />", $string);
    }
}
