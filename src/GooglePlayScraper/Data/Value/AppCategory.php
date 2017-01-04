<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value;

use stdClass;

/**
 * The category value object
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
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

    /**
     * Get identifier.
     * @return string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * Get names
     * @return \stdClass
     */
    public function getNames()
    {
        return $this->names;
    }

    /**
     * Get name by locale
     * @param  string $locale
     * @return string
     */
    public function getName($locale = self::DEFAULT_LOCALE)
    {
        $locale = property_exists($this->names, $locale)
                    ? $locale
                    : self::DEFAULT_LOCALE
        ;
        return $this->names->{$locale};
    }
}
