<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\Region;

class RegionTest extends \PHPUnit_Framework_TestCase {
    public function testSettersAndGetters()
    {
        $region = new Region();
        $region->setName("śląskie");
        $this->assertSame("śląskie",$region->getName());

        $country = new Country("France","FR");
        $region->setCountry($country);
        $this->assertSame($country,$region->getCountry());

        $locality = new Locality();
        $locality->setName("Paris");
        $region->addLocality($locality);
        $lion = new Locality();
        $lion->setName("Lion");
        $region->addLocality($lion);
        $this->assertCount(2, $region->getLocalities());
        $region->removeLocality($locality);
        $this->assertCount(1, $region->getLocalities());

        $this->assertNull($region->getId());
    }
}
