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

/**
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
class Country extends BaseValue
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var code
     */
    protected $locale;

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }
}
