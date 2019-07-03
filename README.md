Yii2 fill color
===============
extension for filling png color

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist web-develop-agat/yii2-fill-color-png "*"
```

or add

```
"web-develop-agat/yii2-fill-color-png": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php (new \WebDevelopAgat\FillColorPng('/path/to/image'))->setColor('#f800be')->save('/path/to/result/image'); ?>
```