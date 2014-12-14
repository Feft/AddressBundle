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
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'address_formatter' => new \Twig_Function_Method($this, 'formatter')
//                new \Twig_Filter_Function('\Feft\AddressBundle\Helper\AddressFormatter::formatter')
        );
    }

    /**
     * Format address.
     *
     * @param Address $address address to write on envelope
     * @param array $options formatting options
     * @return string formatted address
     */
    public function formatter(Address $address, array $options = array())
    {
        $factory = new Factory();
        $formatter = $factory->getInstance($address);

        return nl2br($formatter->getFormattedAddress($options));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'feft_address_extension';
    }
}