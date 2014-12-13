<?php

namespace Feft\AddressBundle\Model\AddressFormatter;


interface IAddressFormatter {
    /**
     * Get formatted address as string for envelope.
     * @param array $options options for formatting - to write
     * @return string
     */
    public function getFormattedAddress($options = array());
} 