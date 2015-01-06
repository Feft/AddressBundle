<?php

namespace Feft\AddressBundle\Model\AddressFormatter;

/**
 * Config for country formatter.
 *
 * @package Feft\AddressBundle\Model\AddressFormatter
 */
class Config
{
    /**
     * End of line symbol for this platform.
     * @var string
     */
    protected $endOfLine;

    /**
     * Default address section separator.
     * Use in inline formatter.
     *
     * @var string
     */
    protected $inLineAddressSectionSeparator;

    /**
     * Default class constructor.
     */
    function __construct()
    {
        $this->endOfLine = PHP_EOL;
        $this->inLineAddressSectionSeparator = ", ";
    }

    /**
     * @return string
     */
    public function getEndOfLine()
    {
        return $this->endOfLine;
    }

    /**
     * @return string
     */
    public function getInLineAddressSectionSeparator()
    {
        return $this->inLineAddressSectionSeparator;
    }


}