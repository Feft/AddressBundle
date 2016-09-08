<?php

namespace Feft\AddressBundle\Model\AddressFactory;
use Feft\AddressBundle\Entity\Address;

/**
 * Interface for address builder classes
 */
interface AddressBuilderInterface {
    /**
     * Address object generate from data, eg. from array (like $_POST).
     *
     * @param $data mixed Address data for builder
     *
     * @return Address Address object
     */
    public function build($data);


} 