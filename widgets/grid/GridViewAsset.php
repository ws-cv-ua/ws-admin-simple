<?php

namespace wscvua\ws_admin_simple\widgets\grid;

class GridViewAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@bower/gentelella/vendors/datatables.net-bs/css';
    public $css = [
        'dataTables.bootstrap.min.css',
    ];
    public $js = [];
    public $depends = [
        'wscvua\ws_admin_simple\assets\ThemeAsset',
    ];
}
