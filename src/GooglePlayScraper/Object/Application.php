<?php
/*
 * This file is part of the GooglePlayScraper package.
 *
 * (c) Smarter Solutions <contacto@smarter.com.ve>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SmarterSolutions\PhpTools\GooglePlayScraper\Object;

use PHPTools\PHPHtmlDom\PHPHtmlDom;

/**
 *
 */
class Application
{
     /**
      * Application identifier.
      * @var string
      */
    public $identifier;
    /**
     * Application url.
     * @var string
     */
    public $url;
    /**
     * Application Name
     * @var string
     */
    public $name;
    /**
     * Application Summary.
     * @var string
     */
    public $summary;
    /**
     * Application description.
     * @var string
     */
    public $description;
    /**
     * Application icon.
     * @var string
     */
    public $icon;
    /**
     * Number of downloads.
     * @var string[]
     */
    public $downloads;
    /**
     * Number of stars that have the application.
     * @var float
     */
    public $score = 0;
    /**
     * Number of app ratings.
     * @var integer
     */
    public $reviews = 0;
    /**
     * Star Ratings Detail.
     * @var array
     */
    public $histogram = [];
    /**
     * Last update.
     * @var string
     */
    public $updated;
    /**
     * Current version of the application.
     * @var float
     */
    public $version;
    /**
     * Required android version (text).
     * @var string
     */
    public $androidVersionText;
    /**
     * Required android version (number).
     * @var float
     */
    public $androidVersion;
    /**
     * Content rating.
     * @var string[]
     */
    public $contentRating;
    /**
     * Application price.
     * @var string
     */
    public $price;
    /**
     * This application is free.
     * @var boolean
     */
    public $free;
    /**
     * Screenshots of the application.
     * @var array
     */
    public $screenshots;
    /**
     * Video application.
     * @var array
     */
    public $video;
    /**
     * Application category.
     * @var string
     */
    public $genre;
    /**
     * App comments.
     * @var array
     */
    public $comments;
    /**
     * What's new in the application.
     * @var array
     */
    public $whatsnew;
    /**
     * Who offers the application.
     * @var string
     */
    public $offeredBy;
    /**
     * Information from the application developers.
     * @var array
     */
    public $developerInfo;

    public function __construct(PHPHtmlDom $dom)
    {
        $this->identifier = $dom->e('[data-docid]')->eq(0)->attrs->{'data-docid'};
        $this->url = $dom->e('[itemprop="url"]')->eq(0)->attrs->content;
        $this->summary = $dom->e('meta[name="description"]')->eq(0)->attrs->content;
        $this->description = $dom
                                ->e('.details-section.description')
                                ->find('[itemprop="description"] > div')
                                ->eq(0)->text
        ;
        $this->setDetailInfo($dom);
        $this->setMetaInfo($dom);
        $this->setReviewsInfo($dom);
        $this->setScreenshotsInfo($dom);
        $this->setWhatsnewInfo($dom);
    }

    private function setDetailInfo(PHPHtmlDom $dom)
    {
        $detailsInfo = $dom->e('.details-info');
        $this->name = $detailsInfo->find('.id-app-title')->eq(0)->text;
        $this->icon = $this->imageUrl(
            $detailsInfo->find('img.cover-image')->eq(0)->attrs->src
        );
        $this->genre = $detailsInfo->find('[itemprop="genre"]')->eq(0)->text;
        $this->price = $this->normalizeFloat(
            $detailsInfo->find('meta[itemprop="price"]')->eq(0)->attrs->content
        );
        $this->free = $this->price == 0;
        return $this;
    }
    private function setMetaInfo(PHPHtmlDom $dom)
    {
        $metadata = $dom->e('.details-section.metadata');
        $this->updated = $this->getElementText($metadata, '[itemprop="datePublished"]');
        $this->version = floatval($this->getElementText($metadata, '[itemprop="softwareVersion"]'));
        $this->androidVersionText = $this->getElementText($metadata, '[itemprop="operatingSystems"]');
        $this->androidVersion = floatval($this->androidVersionText);
        $this->offeredBy = $this->getElementText($metadata, '.meta-info .content', 8);
        $this->downloads = array_filter($this->normalizeFloat(explode(
            ' ',
            $this->getElementText($metadata, '[itemprop="numDownloads"]')
        )), 'floatval');
        $this
            ->setContentRatingInfo($metadata)
            ->setDeveloperInfo($metadata)
        ;
        return $this;
    }
    private function setReviewsInfo(PHPHtmlDom $dom)
    {
        $reviews = $dom->e('.details-section.reviews');
        $this->score = $this->normalizeFloat(
            $this->getElementText($reviews, '.score')
        );
        $this->reviews =  intval(
            $this->getElementText($reviews, '.reviews')
        );
        $this
            ->setHistogramInfo($reviews)
            ->setCommentsInfo($reviews)
        ;
        return $this;
    }
    private function setScreenshotsInfo(PHPHtmlDom $dom)
    {
        $self = $this;
        $screenshotList = [];
        $video = [];
        $dom->e('.details-section.screenshots .thumbnails img')
            ->each(function ($inx, $val) use (&$screenshotList, $self) {
                $screenshotList[] = $self->imageUrl(
                    str_replace('h310', 'h900', $val->attrs->src)
                );
            })
        ;
        $dom->e('.details-section.screenshots .thumbnails .details-trailer')
            ->each(function ($inx, $val) use (&$video, $self) {
                $video[] = array(
                    'image' => $self->imageUrl(
                        $val->childs->find('.video-image')->eq(0)->attrs->src
                    ),
                    'url' => $val->childs->find('.play-action-container')->eq(0)->attrs->{'data-video-url'}
                );
            })
        ;
        $this->screenshots = $screenshotList;
        $this->video = $video;
        return $this;
    }
    private function setWhatsnewInfo(PHPHtmlDom $dom)
    {
        $whatsnew = [];
        $dom->e('.details-section.whatsnew .recent-change')
            ->each(function ($inx, $val) use (&$whatsnew) {
                $whatsnew[] = trim(str_replace('-', '', $val->text));
            })
        ;
        $this->whatsnew = $whatsnew;
        return $this;
    }

    private function setHistogramInfo($reviews)
    {
        $histogram = [];
        $ratingbarContainer = $reviews->find('.rating-bar-container');
        if (is_a($ratingbarContainer, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
            $ratingbarContainer->each(function ($inx, $val) use (&$histogram) {
                $index = intval($val->childs->find('.bar-label')->eq(0)->text);
                $value = intval($val->childs->find('.bar-number')->eq(0)->text);
                $histogram[$index] = $value;
            });
            ksort($histogram);
        }
        $this->histogram = $histogram;
        return $this;
    }
    private function setCommentsInfo($reviews)
    {
        $comments = [];
        $featuredReview = $reviews->find('.featured-review .review-text');
        if (is_a($featuredReview, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
            $featuredReview->each(function ($inx, $val) use (&$comments) {
                $comments[] = $val->text;
            });
        }
        $this->comments = $comments;
        return $this;
    }
    private function setContentRatingInfo($metadata)
    {
        $contentRating = [];
        if (is_a($metadata, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
            $contentRatingList = $metadata->find('[itemprop="contentRating"]');
            if (is_a($contentRatingList, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
                $contentRatingList->each(function ($inx, $val) use (&$contentRating) {
                    $contentRating[] = $val->text;
                });
            }
        }
        $this->contentRating = $contentRating;
        return $this;
    }
    private function setDeveloperInfo($metadata)
    {
        $developerInfo = [];
        $pattern = "/^mailto\:/";
        if (is_a($metadata, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
            $devLinkList = $metadata->find('.meta-info .dev-link');
            if (is_a($devLinkList, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')) {
                $devLinkList->each(function ($inx, $val) use (&$developerInfo, $pattern) {
                    if ($inx > 2) {
                        return;
                    }
                    if (preg_match($pattern, $val->attrs->href)) {
                        $developerInfo['email'] = preg_replace(
                            $pattern,
                            '',
                            $val->attrs->href
                        );
                    } else {
                        $urlQuery = [];
                        parse_str(parse_url($val->attrs->href, PHP_URL_QUERY), $urlQuery);
                        $developerInfo['url'] = $urlQuery['q'];
                    }
                });
            }
        }
        $this->developerInfo = $developerInfo;
        return $this;
    }

    private function imageUrl($url)
    {
        return sprintf(
            "%s:%s",
            parse_url($this->url, PHP_URL_SCHEME),
            $url
        );
    }

    public function getElementText($dom, $selector, $inx = 0)
    {
        $value = null;
        $elements = $dom->find($selector);
        if (is_a($elements, 'PHPTools\PHPHtmlDom\Core\PHPHtmlDomList')
            && $elements->count()
        ) {
            $value = $elements->eq($inx)->text;
        }
        return !$value;
    }
    public function normalizeFloat($val)
    {
        $val = str_replace(',', '.', str_replace('.', '', $val));
        return is_string($val) ? floatval($val) : $val;
    }
}
