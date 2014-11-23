<?php

namespace Feft\AddressBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostalCode
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PostalCode
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=6)
     */
    private $code;


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
     * @return bool
     */
    public function validate()
    {
        if(strlen($this->getCode()) !== 6) {
            return false;
        }
        if(preg_match('/^\d{2}[-]\d{3}$/',$this->getCode()))  {
            return true;
        }
        return false;
    }
}
