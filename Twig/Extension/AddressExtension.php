<?php

namespace Feft\AddressBundle\Twig\Extension;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Model\AddressFormatter\Factory;

/**
 * Address extension
 * Class AddressExtension
 * @package Feft\AddressBundle\Twig\Extension
 */
class AddressExtension extends \Twig_Extension {

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
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'address_envelope_formatter' => new \Twig_Function_Method($this, 'envelopeFormatter'),
            'address_inline_formatter' => new \Twig_Function_Method($this, 'inlineFormatter'),
        );
    }

    /**
     * Format address on envelope.
     *
     * @param Address $address address to write on envelope
     * @param array $options formatting options
     * @return string formatted address
     */
    public function envelopeFormatter(Address $address, array $options = array())
    {
        $formatter = $this->getFactoryInstance($address);
        $options["formatType"] = 'envelope';
        return nl2br($formatter->getEnvelopeFormattedAddress($options));
    }

    public function inlineFormatter(Address $address, array $options = array())
    {
        $formatter = $this->getFactoryInstance($address);
        $options["formatType"] = 'inline';
        return $formatter->getInlineFormattedAddress($options);
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


    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'feft_address_extension';
    }
}