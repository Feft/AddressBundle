<?php

namespace Feft\AddressBundle\Model\PostalValidator;


use Feft\AddressBundle\Entity\PostalCode;

abstract class AbstractPostalCodeValidator implements PostalCodeValidator  {

    /**
     *
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
//        echo "nothing to do, but you have to create validator class for your country\r\n";
        return true;
    }


}