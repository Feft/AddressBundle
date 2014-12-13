<?php

namespace Feft\AddressBundle\Model\AddressFormatter;


interface IAddressFormatter {
    /**
     * Get formatted address as string for envelope.
     *
     * @return string
     */
    public function getFormattedAddress();
} 