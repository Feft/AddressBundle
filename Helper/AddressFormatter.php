<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\FormatterFactory;

/**
 * Class AddressFormatter
 * extends Twig.
 *
 * @package Feft\AddressBundle\Helper
 */
abstract class AddressFormatter implements AddressFormatterHelperInterface
{

    /**
     * Address formatter factory.
     * @var FormatterFactory
     */
    protected $factory;

    public function __construct()
    {
        $this->factory = new FormatterFactory();
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
