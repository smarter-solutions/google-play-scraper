<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data\Repository;

use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreDataAware;

/**
 * This tool allows you to generate the url corresponding to the service to be
 * consumed from Google Play.
 */
class AppCategory extends StoreDataAware implements StoreData
{
    /**
     * @inheritdoc
     * @return boolean
     */
    public function validate($keyName)
    {
        return property_exists($this->data, $keyName);
    }

    /**
     * @inheritdoc
     * @return object|null
     */
    public function get($keyName)
    {
        return $this->validate($keyName) ? $this->data->{$keyName} : null;
    }

    /**
    * @inheritdoc
    */
    public function getId()
    {
        return 'identifier';
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'appcategory';
    }

    /**
     * @inheritdoc
     */
    public function getClass()
    {
        return '\SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\AppCategory';
    }
}
