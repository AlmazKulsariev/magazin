<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/foot/css/style.css',
        '/foot/css/reset.css',
        '/foot/css/fotorama.css',
    ];
    public $js = [
        '/foot/js/script.js',
        '/foot/js/fotorama.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
