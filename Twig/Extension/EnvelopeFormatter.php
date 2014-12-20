<?php

namespace Feft\AddressBundle\Twig\Extension;


use Feft\AddressBundle\Entity\Address;
use Feft\AddressBundle\Helper\EnvelopeAddressFormatter;

/**
 * Formatting the address on the envelope
 *
 * @package Feft\AddressBundle\Twig\Extension
 */
class EnvelopeFormatter extends \Twig_Extension {
    /**
     * Format address on envelope - delegation to AddressFormatter class.
     *
     * @param Address $address address to write on envelope
     * @param array $options formatting options
     * @return string formatted address
     */
    public function envelopeFormatter(Address $address, array $options = array())
    {
        $formatter = new EnvelopeAddressFormatter();
        return $formatter->getFormattedAddress($address,$options);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'feft_twig_envelope_formatter';
    }
}