<?php

class CountryNameFormatterTest extends PHPUnit_Framework_TestCase
{
    private $countryNameFormatter;
    private $options;
    private $country;
    private $config;

    public function setUp()
    {
        $this->options = array();
        $this->country = new \Feft\AddressBundle\Entity\Country("Poland", "PL");
        $this->countryNameFormatter = new \Feft\AddressBundle\Model\AddressFormatter\CountryNameFormatter();
        $this->config = new \Feft\AddressBundle\Model\AddressFormatter\Config();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf("\Feft\AddressBundle\Model\AddressFormatter\Config", $this->config);
        $this->assertInstanceOf("\Feft\AddressBundle\Model\AddressFormatter\CountryNameFormatter",
            $this->countryNameFormatter);
    }

    public function testGetLineEndStringNoKey()
    {
        $this->assertSame("", $this->countryNameFormatter->getFormattedCountryName(
            $this->country,
            $this->options)
        );
    }

    public function testShowCountryNameOption()
    {
        $this->options["showCountryName"] = false;
        $this->assertSame("", $this->countryNameFormatter->getFormattedCountryName(
            $this->country,
            $this->options
        )
        );
        $this->options["showCountryName"] = true;
        $this->assertSame("Poland", $this->countryNameFormatter->getFormattedCountryName(
            $this->country,
            $this->options
        )
        );
    }

    public function testFormatTypeOption()
    {
        $this->options["showCountryName"] = true;
//        $lineEndCreator = new \Feft\AddressBundle\Model\AddressFormatter\EndOfLineCreator();


        $this->options["formatType"] = "FooBar";
        $this->assertSame(
            "Poland",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );

        $this->options["formatType"] = "inline";
        $this->assertSame(
            $this->config->getInLineAddressSectionSeparator() . "Poland",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );

        $this->options["formatType"] = "envelope";
        $this->assertSame(
            $this->config->getEndOfLine() . "Poland",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );
    }

    public function testFormatTypeWithNoShowCountryNameOption()
    {
        # if showCountryName is false all tests must return empty string
        $this->options["showCountryName"] = false;

        $this->options["formatType"] = "FooBar";
        $this->assertSame(
            "",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );

        $this->options["formatType"] = "inline";
        $this->assertSame(
            "",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );

        $this->options["formatType"] = "envelope";
        $this->assertSame(
            "",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );
    }

    public function testInlineFormatWithCountryName()
    {
        $this->options["showCountryName"] = true;
        $this->options["formatType"] = "inline";

        $this->assertSame(
            $this->config->getInLineAddressSectionSeparator() . "Poland",
            $this->countryNameFormatter->getFormattedCountryName($this->country, $this->options)
        );
    }
}
