<?php
namespace Feft\AddressBundle\Model\AddressFormatter\CountryFormatters;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\Config;
use Feft\AddressBundle\Model\AddressFormatter\CountryNameFormatter;
use Feft\AddressBundle\Model\AddressFormatter\AddressFormatterInterface;

/**
 * Class AbstractFormatter.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter\CountryFormatters
 */
abstract class AbstractFormatter implements AddressFormatterInterface
{
    /**
     * Address to format.
     * @var Address
     */
    protected $address;

    /**
     * Config for formatter.
     * @var Config
     */
    protected $config;

    function __construct(Address $address)
    {
        $this->address = $address;

        # formatter configuration
        $this->config = new Config();
    }

    /**
     * Get address.
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add country name (and prefix: new line) to the address if options showCountryName is true.
     *
     * @param array $options array options
     * @return string
     */
    protected function getCountryName($options)
    {
        $countryNameFormatter = new CountryNameFormatter();
        return $countryNameFormatter->getFormattedCountryName($this->getAddress()->getCountry(), $options);
    }
}