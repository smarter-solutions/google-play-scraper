<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper;

use PHPTools\PHPHtmlDom\PHPHtmlDom;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\BaseValue;
use SmarterSolutions\PhpTools\GooglePlayScraper\Helper\Url;

/**
 * Base class that allows you to obtain information from an application of distista forms.
 */
class GooglePlayScraper
{
    /**
     * @var \PHPTools\PHPHtmlDom\PHPHtmlDom
     */
    private $phpHtmlDom;

    /**
     * @var \SmarterSolutions\PhpTools\GooglePlayScraper\Helper\Url
     */
    private $url;

    public function __construct()
    {
        $this->phpHtmlDom = new PHPHtmlDom();
        $this->url = new Url();
    }

    /**
     * Lets you get information about an application by its package name
     * @param  string $packageName Package name
     * @return [type]
     */
    public function findByPackage($packageName, $locale = BaseValue::DEFAULT_LOCALE)
    {
        $url = $this->url->generate(
            'apps_details',
            ['id' => $packageName],
            $locale
        );

        if (!$this->phpHtmlDom->importHTML('data2.txt')) {

        }

        var_dump($this->phpHtmlDom);
    }
}
