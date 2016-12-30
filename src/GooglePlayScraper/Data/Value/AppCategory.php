<?php

namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value;

use stdClass;

/**
 *
 */
class AppCategory extends BaseValue
{
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var stdClass
     */
    protected $names;

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function getNames()
    {
        return $this->names;
    }

    public function getName($locale = self::DEFAULT_LOCALE)
    {
        $locale = property_exists($this->names, $locale)
                    ? $locale
                    : self::DEFAULT_LOCALE
        ;
        return $this->names->{$locale};
    }
}
