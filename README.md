# Google Play Scraper

This is a library that allows you to get the public data of an application published on Google Play.

## Install

Installation is done with composer

```bash
composer require  smarter-solutions/google-play-scraper "~1.0.0"
```
## Quick guide

```php
$scraper = new SmarterSolutions\PhpTools\GooglePlayScraper\GooglePlayScraper();

$data = $scraper->findAppByPackage('com.smartme.analytics');

var_dump($data);
```
**Result**
```html
object(SmarterSolutions\PhpTools\GooglePlayScraper\Object\Application)
    public 'identifier' => string 'com.smartme.analytics'
    public 'url' => string 'https://play.google.com/store/apps/details?id=com.smartme.analytics'
    public 'name' => string 'Smartme App'
    public 'summary' => string 'Smartme is a research app to learn the use of smartphones'
    public 'description' => string 'Smartme App te dice el uso que haces de tu Smartphone y te lo compara con el resto de usuarios. Smartme es una aplicaciÃ³n de investigaciÃ³n de mercados que nos permite conocer cÃ³mo utilizamos los smartphones. DescÃ¡rgatela y obtÃ©n puntos. Haz un uso mÃ¡s inteligente de tu mÃ³vil y Ãºnete a otros panelistas que contribuyen a generar conocimiento sobre los consumidores mÃ³viles.'
    public 'icon' => string 'https://lh3.googleusercontent.com/Sl8QrAwUdS0MPr2DjbvN5doSNbqyNQr0SSbPtf_iwrrJRrIfDvjQNFYCe677ai1tCA=w300',
    public 'downloads' =>
        array
            0 => string '1.000'
            2 => string '5.000'
            public 'score' => float 39
    public 'reviews' => int 195
    public 'histogram' =>
        array
            1 => int 19
            2 => int 3
            3 => int 30
            4 => int 78
            5 => int 65
    public 'updated' => string 'November 2, 2016'
    public 'version' => float 1
    public 'androidVersionText' => string '4.1 and up'
    public 'androidVersion' => float 4.1
    public 'contentRating' =>
        array
            0 => string 'Everyone'
    public 'price' => float 0
    public 'free' => boolean true
    public 'screenshots' =>
        array
            0 => string 'https://lh3.googleusercontent.com/XtSPfwzGdP7xOvCN-FV0FrVJAhXPOpsJtDMc_aKkfh2DXvOo2nE0HHaPZ6mkBCfbhV0=h900'
            1 => string 'https://lh3.googleusercontent.com/9wAZ65hgnMQmokeSOx1f2E6WSPJTLkr3weYFz5bFS0ql6SM4COUjiVu8Lenq7GFPhGY=h900'
            2 => string 'https://lh3.googleusercontent.com/_sUwNINW36ydmsxl2Y-maGn0bC70PqNFw8Y-EtfBcMUX_XOEMw38Nf3YPd7ikbiP4xSk=h900'
            3 => string 'https://lh3.googleusercontent.com/Qg4MPGJXuGp_ucjspYQWLdAiz0qWQ1KtF_RLmQTeOxc8jCMS2Y0srJf0E6U9aQ7ewzA=h900'
            4 => string 'https://lh3.googleusercontent.com/AbBpv_SzqnfXqFnIP1PhHo73YCHDJmwvOV3Uq2cHNzAfw0W-cepWB0OHGM_v7UYpLEo=h900'
    public 'video' =>
        array
            empty
    public 'genre' => string 'Tools' (length=5)
    public 'comments' =>
        array
            0 => string 'Excelente poder ver el uso que le das a tu movil' (length=48)
    public 'whatsnew' =>
        array
            0 => string 'SoluciÃ³n de algunos bugs.' (length=28)
    public 'offeredBy' => string 'Smartme Analytics' (length=17)
    public 'developerInfo' =>
        array
            'url' => string 'http://smartmeanalytics.com/smartmeapp/landing/' (length=47)
            'email' => string 'contact@smartmegroup.com' (length=24)
```
