<?php

namespace Feft\AddressBundle\Helper;

use Feft\AddressBundle\Entity\Address;

/**
 * Class AddressFormatter
 * extends Twig.
 *
 * @package Feft\AddressBundle\Helper
 */
class AddressFormatter {
    const ENV = 'address_on_envelope';
    const INLINE = 'inline_address';

    /**
     * Formatting address as string in international address formats.
     *
     * For more information see:
     * @link http://www.bitboost.com/ref/international-address-formats.html#Formats
     *
     * @param Address $address Address to show
     * @param string $type Type of address format
     *
     * @return string
     */
    public static function formatter(Address $address, $type = self::ENV)
    {
        $text = "address example";
        return $text;
    }
} 