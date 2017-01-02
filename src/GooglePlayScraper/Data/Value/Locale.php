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
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
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
