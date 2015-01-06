<?php

namespace Feft\AddressBundle\Model\PostalValidator;

use Feft\AddressBundle\Entity\PostalCode;

/**
 * Base for postal code validators.
 *
 * @package Feft\AddressBundle\Model\PostalValidator
 */
abstract class AbstractPostalCodeValidator implements PostalCodeValidatorInterface
{

    /**
     * Postal code to validate.
     * @var PostalCode;
     */
    protected $postalCode;

    function __construct(PostalCode $postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * Default validation - no validation.
     * You have to create validator class for your country.
     *
     * @return bool
     */
    public function validate()
    {
        # nothing to do, but you have to create validator class for your country
        return true;
    }


}