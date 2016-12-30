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
    * Allows to obtain the identifier of the rows.
    * @return string
    */
    public function getId();

    /**
     * Allow to obtain the name of the structure that stores data.
     * @return string
     */
    public function getName();

    /**
     * Allow to obtain the name of the structure that stores data.
     * @return string
     */
    public function getClass();
}
