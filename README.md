yii2-basketjs-asset
==========================
Basket.js plugin asset for Yii 2.0 applications.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist hauntd/yii2-basketjs-asset "*"
```

or add

```
"hauntd/yii2-basketjs-asset": "*"
```

to the require section of your `composer.json` file.


Usage
-----
To use this plugin extend your asset class from `hauntd\basketjs\Asset`.

```php

// ./assets/AppAsset.php

class AppAsset extends \hauntd\basketjs\Asset
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/site.js',
        'js/plugins.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
?>
```

License
-------

**yii2-basketjs-asset** is released under the MIT License. See the bundled `LICENSE.md` for details.