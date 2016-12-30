<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmarterSolutions\PhpTools\GooglePlayScraper\Data;

use RuntimeException;
use SmarterSolutions\PhpTools\GooglePlayScraper\Exception;

/**
 * Basic structure for data management.
 * @author Jerry Anselmi <jerry.anselmi@gmail.com>
 */
abstract class StoreDataAware
{
    protected $data;

    public function __construct()
    {
        if (!is_subclass_of($this, 'SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData')) {
            throw new RuntimeException(sprintf(
                "Class %s must implement class %s",
                get_class($this),
                "SmarterSolutions\PhpTools\GooglePlayScraper\Data\StoreData"
            ));
        }
        $this->import();
    }

    /**
     * Import data from a repository.
     *
     * @throw SmarterSolutions\PhpTools\GooglePlayScraper\Exception\DataFieException
     * @throw SmarterSolutions\PhpTools\GooglePlayScraper\Exception\ParseDataFieException
     *
     * @return self
     */
    private function import()
    {
        $filename = sprintf(
            "%s/store/%s.json",
            __DIR__,
            $this->getDataName()
        );

        if (!is_readable($filename)) {
            throw new Exception\DataFieException(sprintf(
                "The [%s] data file does not exist or you do not have read permissions.",
                $filename
            ));
        }

        $this->data = json_decode(file_get_contents($filename));

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception\ParseDataFieException(sprintf(
                "Failed to import data file [% s] may not be a valid json format.",
                $filename
            ));
        }
    }
}
