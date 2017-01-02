<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SmarterSolutions\PhpTools\GooglePlayScraper;

use PHPTools\PHPHtmlDom\PHPHtmlDom;
use SmarterSolutions\PhpTools\GooglePlayScraper\Data\Value\BaseValue;
use SmarterSolutions\PhpTools\GooglePlayScraper\Helper\Url;
use SmarterSolutions\PhpTools\GooglePlayScraper\Exception as SmarterException;
use SmarterSolutions\PhpTools\GooglePlayScraper\Object as SmarterObject;

/**
 * Base class that allows you to obtain information from an application of distista forms.
 *
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
class GooglePlayScraper
{
    /**
     * @var \PHPTools\PHPHtmlDom\PHPHtmlDom
     */
    private $dom;

    /**
     * @var \SmarterSolutions\PhpTools\GooglePlayScraper\Helper\Url
     */
    private $url;

    public function __construct()
    {
        $this->dom = new PHPHtmlDom();
        $this->url = new Url();
    }

    /**
     * Lets you get information about an application by its package name
     * @param  string $packageName Package name
     * @return \SmarterSolutions\PhpTools\GooglePlayScraper\Object\Application
     *
     * @throw \SmarterSolutions\PhpTools\GooglePlayScraper\Exception\HtmlImportException
     * @throw \SmarterSolutions\PhpTools\GooglePlayScraper\Exception\NotFoundException
     */
    public function findAppByPackage($packageName, $locale = BaseValue::DEFAULT_LOCALE)
    {
        $url = $this->url->generate(
            'apps_details',
            ['id' => $packageName],
            $locale
        );

        if (!$this->dom->importHTML($url)) {
            throw new SmarterException\HtmlImportException(sprintf(
                "Can not import html from url [%s]",
                $url
            ));
        }

        if ($this->isNotFound()) {
            throw new SmarterException\NotFoundException(sprintf(
                "Not found application by package [%s]",
                $packageName
            ));
        }
        return new SmarterObject\Application($this->dom);
    }

    private function isNotFound()
    {
        return !!$this->dom->e('#error-section')->count();
    }
}
