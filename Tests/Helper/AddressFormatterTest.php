<?php
namespace Feft\AddressBundle\Tests;

use Feft\AddressBundle\Helper\EnvelopeAddressFormatter;
use Feft\AddressBundle\Helper\InlineAddressFormatter;

class AddressFormatterTest extends \PHPUnit_Framework_TestCase {
    public function testCreation()
    {
        $envelopeFormatter = new EnvelopeAddressFormatter();
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\AddressFormatter",$envelopeFormatter);
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\AddressFormatterHelperInterface",$envelopeFormatter);
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\EnvelopeAddressFormatter",$envelopeFormatter);

        $inlineFormatter = new InlineAddressFormatter();
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\AddressFormatter",$inlineFormatter);
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\AddressFormatterHelperInterface",$inlineFormatter);
        $this->assertInstanceOf("\Feft\AddressBundle\Helper\InlineAddressFormatter",$inlineFormatter);
    }
}
