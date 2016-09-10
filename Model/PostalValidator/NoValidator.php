<?php
namespace Feft\AddressBundle\Model\PostalValidator;

use Feft\AddressBundle\Entity\PostalCode;

/**
 * Class NoValidator
 * Used when you work with country without validation class for this country.
 * Always return true in validate() method (designed in abstract class).
 */
class NoValidator extends AbstractPostalCodeValidator implements PostalCodeValidatorInterface
{
    /**
     * @inheritdoc
     *
     * @param PostalCode $postalCode Postal code to validate.
     */
    public function __construct(PostalCode $postalCode)
    {
        parent::__construct($postalCode);
    }

}
