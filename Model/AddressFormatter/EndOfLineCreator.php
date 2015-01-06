<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

/**
 * Class generate end of line symbol according
 * to formatting type.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter
 */
class EndOfLineCreator
{
    /**
     * Generating end of line symbol using Config class
     * and formatType option.
     *
     * @param array $options Table of formatting options
     * @param Config $config Configuration class
     *
     * @return string End of line symbol
     */
    public function generateEndOfLineString(array $options, Config $config)
    {
        # if no key in array
        if (false === array_key_exists('formatType', $options)) {
            return "";
        }
        # If format type is for envelope return line ending symbol (eg. \r\n)
        # No line ending if inline format type.
        if ($options["formatType"] === "envelope") {
            return $config->getEndOfLine();
        } elseif ($options["formatType"] === "inline") {
            return $config->getInLineAddressSectionSeparator();
        }
        return "";
    }

}
