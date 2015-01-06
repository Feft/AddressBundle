<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Entity\Region;

class PlaceTest extends \PHPUnit_Framework_TestCase
{
    public function testName()
    {
        $place = new Locality();
        $place->setName("Tychy");
        $this->assertEquals("Tychy", $place->getName());
    }

    public function testRegion()
    {
        $place = new Locality();
        $region = new Region();
        $region->setName("ziemia łęczycka");
        $place->setRegion($region);
        $this->assertEquals("ziemia łęczycka", $place->getRegion()->getName());

    }

    public function testId()
    {
        $place = new Locality();
        $this->assertNull($place->getId());
    }
}
 