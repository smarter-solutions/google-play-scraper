<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Helper;

/**
 * This tool allows you to generate the url corresponding to the service to be
 * consumed from Google Play.
 */
class GenerateUrl
{
    const BASE_URL = 'https://play.google.com/store/apps';

    public function setLanguage($lang)
    {
        $this->lang = $lang;
    }
}
// /store/apps/category
// details
