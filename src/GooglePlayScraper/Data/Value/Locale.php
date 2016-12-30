<?php

namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value;

use stdClass;

/**
 *
 */
class Locale extends BaseValue
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var stdClass
     */
    protected $locale;

    public function getLocaler()
    {
        return $this->locale;
    }

    public function getName()
    {
        return $this->name;
    }
}
