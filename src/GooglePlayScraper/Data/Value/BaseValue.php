<?php

namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value;

use stdClass;

/**
 *
 */
class BaseValue
{
    const DEFAULT_LOCALE = 'en';

    public function __construct(stdClass $row)
    {
        foreach ($row as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }
}
