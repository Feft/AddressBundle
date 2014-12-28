<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\Factory;

/**
 * Class AddressFormatter
 * extends Twig.
 *
 * @package Feft\AddressBundle\Helper
 */
abstract class AddressFormatter implements AddressFormatterHelperInterface {

    /**
     * Address formatter factory.
     * @var Factory
     */
    protected $factory;

    function __construct()
    {
        $this->factory = new Factory();
    }

    /**
     * Address formatter instance based on country (stored in address).
     *
     * @param Address $address
     * @return \Feft\AddressBundle\Model\AddressFormatter\CountryFormatters\DefaultFormatter
     */
    protected function getFactoryInstance(Address $address)
    {
        return $this->factory->getInstance($address);
    }
}