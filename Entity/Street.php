<?php

namespace Feft\AddressBundle\Entity;

/**
 * Street
 */
class Street
{
    /**
     * @var integer
     */
    private $id;

    /**
     * Street name
     * @var string
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     * @return Street
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Default implementation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
