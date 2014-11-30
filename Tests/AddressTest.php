<?php


namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\Region;
use Feft\AddressBundle\Entity\PostalCode;

class AddressTest extends \PHPUnit_Framework_TestCase {

    public function testFullObjectDemo()
    {
        $address = new Address();
        $country = new Country("Poland","PL");

        $address->setCountry($country);

        $locality = new Locality();
        $region = new Region();
        $region->setName("ziemia łęczycka");
        $locality->setRegion($region);
        $region->addLocality($locality);

        $address->setRegion($region);
        $address->setLocality($locality);

        $zip = new PostalCode();
        $address->setPostalCode($zip);
        $zip->setCode("00-950");

        $this->assertSame($address->getRegion(), $locality->getRegion());
        $this->assertSame($address->getLocality(), $region->getLocalities()->first());
    }


    public function testSetNumber()
    {
        $obj = new Address();
        $obj->setNumber("20/21");
        $this->assertEquals("20/21", $obj->getNumber());
    }

    public function testSetCountry()
    {
        $obj = new Address();
        $obj->setCountry(new Country());
        $this->assertInstanceOf("Feft\AddressBundle\Entity\Country",$obj->getCountry());
    }

    public function testCreation()
    {
        $this->assertInstanceOf('Feft\AddressBundle\Entity\Address', new Address());
    }

    public function testPostalCode()
    {
        $obj = new Address();
        $code = new PostalCode();
        $obj->setPostalCode($code);
        $code->setCode("abcde");
        $this->assertEquals($code->getCode(),$obj->getPostalCode()->getCode());
    }
}
 