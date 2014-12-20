<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

/**
 * Interface IAddressFormatter
 * @package Feft\AddressBundle\Model\AddressFormatter
 */
interface IAddressFormatter {
    /**
     * Get formatted address as string for envelope.
     * @param array $options options for formatting - to write
     * @return string
     */
    public function getEnvelopeFormattedAddress(array $options = array());
} 