<?php


namespace Feft\AddressBundle\Model\PostalValidator;

    /**
     * Interface PostalCodeValidatorInterface
     *
     * @package Feft\AddressBundle\Model
     */
    interface PostalCodeValidatorInterface {
        /**
         * Validate postal code.
         *
         * @return bool
         */
        public function validate();
    }
