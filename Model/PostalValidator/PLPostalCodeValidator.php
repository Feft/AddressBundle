<?php
namespace Feft\AddressBundle\Model\PostalValidator;

use Feft\AddressBundle\Entity\PostalCode;

/**
 * Validation for polish postal codes.
 * Correct code is dd-ddd where d is digit [0-9].
 *
 * @package Feft\AddressBundle\Model\PostalValidator
 */
class PLPostalCodeValidator extends AbstractPostalCodeValidator implements PostalCodeValidatorInterface
{

    /**
     * Run parent constructor - set postalCode attribute.
     *
     * @param PostalCode $postalCode
     */
    public function __construct(PostalCode $postalCode)
    {
        parent::__construct($postalCode);
    }

    /**
     * Validation for polish postal codes.
     * Correct code is dd-ddd where d is digit [0-9].
     *
     * @return bool
     */
    public function validate()
    {
        # check length - 6 digits
        if (strlen($this->postalCode->getCode()) !== 6) {
            return false;
        }

        # check format: dwo digits, dash, three digits
        if (preg_match('/^\d{2}[-]\d{3}$/', $this->postalCode->getCode())) {
            return true;
        }
        return false;
    }

}
