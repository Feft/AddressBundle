<?php


namespace Feft\AddressBundle\Model\PostalValidator;

    /**
     * Interface PostalCodeValidator
     *
     * @package Feft\AddressBundle\Model
     */
    interface PostalCodeValidator {
        /**
         * Validate postal code.
         *
         * @return bool
         */
        public function validate();
    }
