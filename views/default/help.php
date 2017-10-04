<?php

/**
 * @var $this \yii\web\View
 */

use wscvua\ws_admin_simple\Module;

$this->title = 'DevHelp';

$bundle = nezhelskoy\highlight\HighlightAsset::register($this);
$bundle->css = ['dist/styles/dracula.css'];

$css = <<<CSS
#dev-help pre{
padding: 0;
border: 0;
}
.hljs{
background: #2A3F54;
}
CSS;

$this->registerCss($css);
?>

<div class="page-title">
    <div class="title_left">
        <h3><?= $this->title ?></h3>
    </div>
</div>

<div id="dev-help">
    <div class="row">
        <div class="col-md-4">
            <?= $this->render('help/settings'); ?>
        </div>
        <div class="col-md-4">
            <?= $this->render('help/langs'); ?>
        </div>
    </div>
</div>