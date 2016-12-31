<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Repository;

use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreDataAware;

/**
 * This tool allows you to generate the url corresponding to the service to be
 * consumed from Google Play.
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
