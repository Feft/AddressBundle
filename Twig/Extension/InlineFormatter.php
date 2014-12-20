<?php

namespace Feft\AddressBundle\Twig\Extension;

use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Helper\InlineAddressFormatter;

/**
 * Inline address formatting
 *
 * @package Feft\AddressBundle\Twig\Extension
 */
class InlineFormatter extends \Twig_Extension {

    /**
     * Inline format address  - delegation to AddressFormatter class.
     *
     * @param Address $address address to write on envelope
     * @param array $options formatting options
     * @return string formatted address
     */
    public function inlineFormatter(Address $address, array $options = array())
    {
        $formatter = new InlineAddressFormatter();
        return $formatter->getFormattedAddress($address,$options);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'feft_inline_formatter';
    }
}