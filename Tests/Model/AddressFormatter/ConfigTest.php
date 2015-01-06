<?php

class ConfigTest extends PHPUnit_Framework_TestCase
{

    public function testGetters()
    {
        $config = new \Feft\AddressBundle\Model\AddressFormatter\Config();
        $this->assertEquals(", ", $config->getInLineAddressSectionSeparator());
        $this->assertEquals(PHP_EOL, $config->getEndOfLine());
    }
}
