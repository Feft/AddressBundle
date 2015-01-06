<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Country;
use Feft\AddressBundle\Entity\Locality;
use Feft\AddressBundle\Entity\Region;

class RegionTest extends \PHPUnit_Framework_TestCase
{
    public function testSettersAndGetters()
    {
        $region = new Region();
        $region->setName("śląskie");
        $this->assertSame("śląskie", $region->getName());

        $country = new Country("France", "FR");
        $region->setCountry($country);
        $this->assertSame($country, $region->getCountry());

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


    public function testAddRegion()
    {
        $regions = array(
            "dolnośląskie",
            "kujawsko-pomorskie",
            "lubelskie",
            "lubuskie",
            "łódzkie",
            "małopolskie",
            "mazowieckie",
            "opolskie",
            "podkarpackie",
            "podlaskie",
            "pomorskie",
            "śląskie",
            "świętokrzyskie",
            "warmińsko-mazurskie",
            "wielkopolskie",
            "zachodniopomorskie"
        );
        $country = new Country();
        $country->setName("Poland");

        foreach ($regions as $r) {
            $region = new Region();
            $region->setName($r);

            #separate object for removeElement test
            if ($r == "wielkopolskie") {
                $region2 = new Region();
                $region2->setName($r);
                $country->addRegion($region2);
            } else {
                $country->addRegion($region);
            }


        }
        $this->assertCount(16, $country->getRegions());

        $i = 0;
        foreach ($country->getRegions() as $r) {
            $this->assertSame($regions[$i++], $r->getName());
        }

        $country->getRegions()->removeElement($region2);
        $this->assertCount(15, $country->getRegions());
    }
}
