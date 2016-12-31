<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Helper;

use \SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\BaseValue;
use \SmarterSolutions\PhpTools\GooglePlayScraper\Data\Repository\Locale;
use \SmarterSolutions\PhpTools\GooglePlayScraper\Exception\UrlAliasException;

/**
 * This tool allows you to generate the url corresponding to the service to be
 * consumed from Google Play.
 *
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
class Url
{
    const BASE_URL = 'https://play.google.com/store';

    private $urlAlias = [
        'apps_category' => '/apps/category',
        'apps_details' => '/apps/details'
    ];

    public function __construct()
    {
        $this->locale = new Locale();
    }

    /**
     * It allows to generate a url.
     * @param  string $alias
     * @param  array $params
     * @param  string $locale
     * @return string|null
     *
     * @throw \SmarterSolutions\PhpTools\GooglePlayScraper\Exception\UrlAliasException
     */
    public function generate($alias, array $params = [], $locale = BaseValue::DEFAULT_LOCALE)
    {
        if (!array_key_exists($alias, $this->urlAlias)) {
            throw new UrlAliasException(sprintf(
                "Alias [%s] does not exist.",
                $alias
            ));
        }

        $params['hl'] = $this->getLocale($locale);
        $params = http_build_query($params);
        $querySeparator = empty($params) ? '': '?';
        
        return sprintf(
            "%s%s%s%s",
            self::BASE_URL,
            $this->urlAlias[$alias],
            $querySeparator,
            $params
        );
    }

    private function getLocale($locale)
    {
        return $this->locale->isLocale($locale)
                            ? $locale
                            : BaseValue::DEFAULT_LOCALE
        ;
    }
}
//
//
