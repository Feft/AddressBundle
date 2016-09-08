<?php

namespace Feft\AddressBundle\Model\AddressFactory;

/**
 * Address builder factory.
 * Supported data formats: json string or array (key => value).
 */
class AddressBuilderFactory
{
    /**
     * Builder
     *
     * @param $data mixed
     *
     * @return AddressBuilder|JsonAddressBuilder
     */
    public function getInstance($data)
    {
        if(is_array($data)) {
            $builder = new AddressBuilder();
        } elseif(is_string($data)) {
            $builder = new JsonAddressBuilder();
        } else {
            throw new \InvalidArgumentException();
        }

        return $builder;
    }
} 