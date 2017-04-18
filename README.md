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
    public 'description' =>
        array
            0 => 'Smartme App es la app gratuita que te da acceso al Club Smartme. Sácale mayor partido a tu móvil mientras disfrutas de los privilegios de formar parte de un exclusivo Club Privado en el que recibes: Descuentos en primeras marcas como Amazon, Tous, Carrefour, Booking, Telepizza, Casa del Libro, Pull & Bear, Decathlon, Apple, entre otras, Dinero directo, Devolución de un porcentaje de las compras de productos seleccionados, Participación en Sorteos mensuales y muchas sorpresas más.'
            ...
            11 => '¡Únete ahora a nuestra comunidad y recibe 5.000 puntos de bienvenida!'
    public 'icon' => string 'https://lh3.googleusercontent.com/Sl8QrAwUdS0MPr2DjbvN5doSNbqyNQr0SSbPtf_iwrrJRrIfDvjQNFYCe677ai1tCA=w300',
    public 'downloads' =>
        array
            'raw' => string '1.000 - 5.000'
            'values' =>
                array
                    0 => float 1000
                    1 => float 5000
    public 'score' => float 39
    public 'reviews' =>
        array
            'raw' => string '216'
            'value' => float 216
    public 'histogram' =>
        array
          1 =>
            array
                'raw' => string '19'
                'value' => float 19
          2 =>
            array
                'raw' => string '5'
                'value' => float 5
          3 =>
            array
                'raw' => string '30'
                'value' => float 30
          4 =>
            array
                'raw' => string '79'
                'value' => float 79
          5 =>
            array
                'raw' => string '83'
                'value' => float 83
    public 'updated' => string '21 de marzo de 2017'
    public 'version' =>
        array
            'raw' => string '2.0.1'
            'value' => string '2.0.1'
    public 'androidVersion' =>
        array
            'raw' => string '4.1 y versiones superiores'
            'value' => string '4.1'
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
    public 'genre' => string 'Tools'
    public 'comments' =>
        array
            0 => string 'Esta muy bien y no molesta tenerla instalada'
            ...
            39 => string 'Espero que es verdad lo de los puntos,la aplicación tiene buena grafica ðEs verdad, una estafa y Toluna por desinstalar la app me quitaron puntos de mi cuenta de Toluna'
    public 'whatsnew' =>
        array
            0 => string 'Hemos incluido la posibilidad de modificar tu contraseña desde la sección "Mi perfil".' (length=92)
            1 => string 'Además, hemos solucionado algunos problemas de desempeño y sincronización de datos.' (length=92)
            2 => string '¡Sigue disfrutando de las ventajas del Club Smartme!'
    public 'offeredBy' => string 'Smartme Analytics'
    public 'developerInfo' =>
        array
            'url' => string 'http://smartmeanalytics.com/smartmeapp/landing/'
            'email' => string 'contact@smartmegroup.com'
```

You can also set the locale. By default English.

```php
$scraper = new SmarterSolutions\PhpTools\GooglePlayScraper\GooglePlayScraper();

$data1 = $scraper->findAppByPackage('com.smartme.analytics', 'es');
$data2 = $scraper->findAppByPackage('com.smartme.analytics', 'es_419');
$data3 = $scraper->findAppByPackage('com.smartme.analytics', 'de');
$data4 = $scraper->findAppByPackage('com.smartme.analytics', 'en_GB');
```
