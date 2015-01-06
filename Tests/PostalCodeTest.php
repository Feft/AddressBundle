<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Model\PostalValidator\Factory;

class PostalCodeTest extends \PHPUnit_Framework_TestCase
{
    private $code;

    public function setUp()
    {
        $this->code = new PostalCode();
        # create instance of validator for polish postal codes.
        $this->code->setValidator(Factory::getInstance($this->code, "PL"));
    }

    function testCreation()
    {
        $this->assertInstanceOf('Feft\AddressBundle\Entity\PostalCode', $this->code);
        $this->assertNull($this->code->getId());
    }

    function testValidationTrue()
    {
        $this->code->setCode("43-220");
        $this->assertTrue($this->code->validate());
    }

    function testValidationFalse()
    {
        $this->code->setCode("43220");
        $this->assertFalse($this->code->validate());
    }

    function testValidationBadFormat()
    {
        $this->code->setCode("abcdef");
        $this->assertFalse($this->code->validate());
    }


    function testValidationFalseNoSetCode()
    {
        $this->code->setCode(null);
        $this->assertFalse($this->code->validate());
    }

    function testException()
    {
        try {
            $this->code = new PostalCode();
            # methods throws \Exception because no validator in the object
            $this->code->validate();
        } catch (\Exception $e) {
            $this->assertInstanceOf('\Exception', $e);
        }


    }


}
 