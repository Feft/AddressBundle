<?php

namespace Feft\AddressBundle\Tests;


use Feft\AddressBundle\Entity\PostalCode;
use Feft\AddressBundle\Model\PostalValidator\Factory;
use Feft\AddressBundle\Model\PostalValidator\NoValidator;

class NoValidatorTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $code = new PostalCode();
        # code for not existing country
        $validator = Factory::getInstance($code, "UUU");
        # is both object NoValidator?
        $this->assertEquals(new NoValidator($code), $validator);
        $this->assertTrue($validator->validate());
    }
}
 