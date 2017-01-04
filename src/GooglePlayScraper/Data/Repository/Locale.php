<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Repository;

use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreDataAware;

/**
 * This class allows you to handle locale,
 *
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
class Locale extends StoreDataAware implements StoreData
{
    public function isLocale($locale)
    {
        return !!$this->find($locale);
    }

    /**
    * @inheritdoc
    */
    public function getId()
    {
        return 'locale';
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'locale';
    }

    /**
     * @inheritdoc
     */
    public function getClass()
    {
        return '\SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\Locale';
    }
}
