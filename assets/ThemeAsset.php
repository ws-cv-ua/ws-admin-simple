<?php

namespace wscvua\ws_admin_simple\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class ThemeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ws-cv-ua/ws-admin-simple/dist/theme';
    public $css = [
        'switchery/switchery.min.css',
        'iCheck/skins/flat/green.css',
        'css/custom.css'
    ];
    public $js = [
        'iCheck/icheck.min.js',
        'switchery/switchery.min.js',
        'js/bootstrap-progressbar.min.js',
        'js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'rmrevin\yii\fontawesome\AssetBundle',
    ];
}
