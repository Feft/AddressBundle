<?php

namespace Feft\AddressBundle\Tests;

use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Model\PostalValidator\Factory;

class PLPostalCodeValidatorTest extends \PHPUnit_Framework_TestCase {
    private $code;
    private $validator;
    public function setUp()
    {
        $this->code = new PostalCode();
        $this->validator = Factory::getInstance($this->code,"PL");
    }

    public function testCreation()
    {
        $this->assertInstanceOf('Feft\AddressBundle\Entity\PostalCode', $this->code);
        $this->assertNull($this->code->getId());
    }

    function testValidationFalse()
    {
        $this->code->setCode("43220");
        $this->assertFalse($this->validator->validate());
    }

    function testValidationBadFormat()
    {
        $this->code->setCode("abcdef");
        $this->assertFalse($this->validator->validate());
    }


    function testValidationFalseNoSetCode()
    {
        $this->code->setCode(null);
        $this->assertFalse($this->validator->validate());
    }
}
 