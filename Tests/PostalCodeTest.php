<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\PostalCode;

class ZipCodeTest extends \PHPUnit_Framework_TestCase {
    private $code;

    public function setUp()
    {
        $this->code = new PostalCode();
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
        # ta linia jest po to, żeby zrobić pełne pokrycie kodu
//        $id = $this->object->getId();
    }



}
 