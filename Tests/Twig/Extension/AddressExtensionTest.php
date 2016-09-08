<?php
namespace Feft\AddressBundle\Tests;

use Feft\AddressBundle\Twig\Extension\AddressExtension;

class AddressExtensionTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFunctions()
    {
        $extension = new AddressExtension();
        $functionsArray = $extension->getFunctions();

        $this->assertCount(2, $functionsArray);

        foreach ($functionsArray as $a) {
            $this->assertInstanceOf("\Twig_SimpleFilter", $a);
        }
    }

    public function testGetName()
    {
        $extension = new AddressExtension();
        $this->assertSame("feft_address_extension", $extension->getName());
    }
}
