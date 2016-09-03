<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Feft\AddressBundle\Model\PostalValidator\PostalCodeValidatorInterface;

/**
 * PostalCode
 */
class PostalCode implements PostalCodeValidatorInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * Postal code.
     *
     * @var string
     */
    private $code;

    /**
     * Postal code validator.
     *
     * @var PostalCodeValidatorInterface
     */
    private $validator;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return PostalCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Validate postal code in Poland. Correct code is dd-ddd where d is digit [0-9],
     *
     * @throws \Exception
     * @return bool
     */
    public function validate()
    {
        if (!is_object($this->getValidator())) {
            throw new \Exception("Missing validation method.");
        }
        return $this->getValidator()->validate();
    }

    /**
     * Get validation method.
     * @return PostalCodeValidatorInterface
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * Set validation method.
     *
     * @param PostalCodeValidatorInterface $validator
     * @return $this
     */
    public function setValidator(PostalCodeValidatorInterface $validator)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * Default implementation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getCode();
    }

}
