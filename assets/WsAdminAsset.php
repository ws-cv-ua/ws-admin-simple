<?php

namespace wscvua\ws_admin_simple\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class WsAdminAsset extends AssetBundle
{
    public $sourcePath = '@vendor/ws-cv-ua/ws-admin-simple/dist';
    public $css = [
        'css/bootstrap-multiselect.css',
        'css/ws-admin.css',
    ];
    public $js = [
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js',
        'js/bootstrap-multiselect.js',
        'js/locale-file-input.js',
        'js/ws-admin.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'wscvua\ws_admin_simple\assets\ThemeAsset',
    ];
}
