<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 23.11.14
 * Time: 16:01
 */

namespace Feft\AddressBundle\Model\PostalValidator;


use Feft\AddressBundle\Entity\PostalCode;

/**
 * Class NoValidator
 * Used when you work with country without validation class for this country.
 * Always return true in validate() method (designed in abstract class).
 *
 * @package Feft\AddressBundle\Model\PostalValidator
 */
class NoValidator extends AbstractPostalCodeValidator {
    function __construct(PostalCode $postalCode)
    {
        parent::__construct($postalCode);
    }

} 