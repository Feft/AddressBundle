<?php
namespace Feft\AddressBundle\Model\PostalValidator;
use Feft\AddressBundle\Entity\PostalCode;


class PLPostalCodeValidator extends AbstractPostalCodeValidator implements PostalCodeValidator  {

    function __construct(PostalCode $postalCode)
    {
        parent::__construct($postalCode);
    }

    /**
     * Validation for polish postal codes.
     * Correct code is dd-ddd where d is digit [0-9],
     *
     * @return bool
     */
    public function validate()
    {
        if(strlen($this->postalCode->getCode()) !== 6) {
            return false;
        }
        if(preg_match('/^\d{2}[-]\d{3}$/',$this->postalCode->getCode()))  {
            return true;
        }
        return false;
    }
}