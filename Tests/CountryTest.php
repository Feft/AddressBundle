<?php
/**
 * Country class tests.
 */

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Region;

class CountryTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersAndGetters()
    {
        $country = new \Feft\AddressBundle\Entity\Country("Poland", "PL");
        $this->assertSame("PL", $country->getCode());
        $country->setLocalShortName("Polska");
        $this->assertSame('Polska', $country->getLocalShortName());

        $this->assertEquals("Poland",$country->getName());

        $country->setCode("US");
        $this->assertEquals("US", $country->getCode());

        $this->assertNull($country->getId());
    }

    public function testAddRegion()
    {
        $country = new Country("Poland", "PL");
        $region = new Region();
        $region->setName("ziemia łęczycka");

        $country->addRegion($region);
        $this->assertCount(1, $country->getRegions());
        $this->assertSame($region, $country->getRegions()->first());
        $this->assertInstanceOf("Doctrine\Common\Collections\Collection", $country->getRegions());

        $country->removeRegion($region);
        $this->assertCount(0, $country->getRegions());
    }

    public function testLocalName()
    {
        $country = new Country("Poland", "PL");
        $country->setLocalShortName("Polska");

        $this->assertEquals("Polska", $country->getLocalShortName());
    }
}
 
