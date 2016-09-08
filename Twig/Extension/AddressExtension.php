<?php

namespace Feft\AddressBundle\Twig\Extension;

/**
 * Address extension - registration formatting functions
 * Class AddressExtension
 * @package Feft\AddressBundle\Twig\Extension
 */
class AddressExtension extends \Twig_Extension
{

    /**
     * Registration formatting functions.
     *
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'address_inline_formatter' => new \Twig_SimpleFilter(new InlineFormatter(), 'inlineFormatter'),
            'address_envelope_formatter' => new \Twig_SimpleFilter(new EnvelopeFormatter(), 'envelopeFormatter'),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'feft_address_extension';
    }

}
