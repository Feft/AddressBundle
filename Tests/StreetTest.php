<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\Street;

class StreetTest extends \PHPUnit_Framework_TestCase
{
    public function testCreation()
    {
        $this->assertInstanceOf("Feft\AddressBundle\Entity\Street", new Street());
    }

    public function testSettersAndGetters()
    {
        $street = new Street();
        $name = "Myśliwska";
        $street->setName($name);
        $this->assertSame($name, $street->getName());
        $this->assertNull($street->getId());
    }
}
 