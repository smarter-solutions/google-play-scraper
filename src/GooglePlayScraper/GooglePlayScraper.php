<?php
namespace SmarterSolutions\PhpTools\GooglePlayScraper;

use PHPTools\PHPHtmlDom\PHPHtmlDom;

/**
 * Base class that allows you to obtain information from an application of distista forms.
 */
class GooglePlayScraper
{
    /**
     * @var \PHPTools\PHPHtmlDom\PHPHtmlDom
     */
    private $dom;

    /**
     * @var \PHPTools\PHPHtmlDom\PHPHtmlDom
     */
    private $phpHtmlDom;

    public function __construct()
    {
        $this->phpHtmlDom = new PHPHtmlDom();
    }

    /**
     * Lets you get information about an application by its package name
     * @param  string $packageName Package name
     * @return [type]
     */
    public function findByPackage($packageName)
    {
        # code...
    }
}
