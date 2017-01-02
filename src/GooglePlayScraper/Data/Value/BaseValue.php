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
