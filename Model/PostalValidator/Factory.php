<?php

namespace Feft\AddressBundle\Model\PostalValidator;

use Feft\AddressBundle\Entity\PostalCode;

/**
 * Get specific postal validator
 * from country alpha2code string.
 * @package Feft\AddressBundle\Model\PostalValidator
 */
class Factory
{
    /**
     * Get specific validator.
     * Using __NAMESPACE__ constant.
     *
     * @param PostalCode $postalCode
     * @param string $countryAlpha2Code Two-letter code (ISO 3166)
     * @return PostalCodeValidatorInterface
     */
    public static function getInstance(PostalCode $postalCode, $countryAlpha2Code)
    {
        $validatorName = __NAMESPACE__ . '\\' . $countryAlpha2Code . "PostalCodeValidator";

        if (class_exists($validatorName)) {
            return new $validatorName($postalCode);
        } else {
            return new NoValidator($postalCode);
        }
    }
}