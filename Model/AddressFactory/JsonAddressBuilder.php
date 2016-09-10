<?php

namespace Feft\AddressBundle\Model\AddressFactory;

/**
 * @inheritdoc
 */
class JsonAddressBuilder extends AddressBuilder
{

    /**
     * Convert JSON encoded address data to Address object.
     *
     * @param string $data JSON encoded address data
     *
     * @return \Feft\AddressBundle\Entity\Address
     */
    public function build($data)
    {
        $array = json_decode($data, true);

        return parent::build($array);
    }

} 