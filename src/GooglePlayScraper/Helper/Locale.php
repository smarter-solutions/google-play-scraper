<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Helper;

use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreDataAware;

/**
 * This tool allows you to generate the url corresponding to the service to be
 * consumed from Google Play.
 */
class Locale extends StoreDataAware implements StoreData
{
    public function getDataName()
    {
        return 'locale';
    }

    public function validate($locale)
    {
        $position = -1;
        foreach ($this->data as $key => $row) {
            if ($row->locale == $locale) {
                $position = $key;
                break;
            }
        }
        return $position;
    }

    public function get($locale)
    {
        $inx = $this->validate($locale);
        return isset($this->data[$inx]) ? $this->data[$inx] : null;
    }
}
// /store/apps/category
// details
