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
 * This class allows countries to manage.
 *
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
class Country extends StoreDataAware implements StoreData
{
    public function isCode($code)
    {
        return !!$this->find($code);
    }

    /**
    * @inheritdoc
    */
    public function getId()
    {
        return 'code';
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function getClass()
    {
        return '\SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\Country';
    }
}
