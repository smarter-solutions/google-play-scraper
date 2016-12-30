<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data;

/**
 * Interface for data management
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
interface StoreData
{
    /**
     * Allow to obtain the name of the structure that stores data.
     * @return string
     */
    public function getDataName();
}
