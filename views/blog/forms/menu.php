<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsMenu */
/* @var $form ActiveForm */
$menuList = \wscvua\ws_admin_simple\models\blog\WsMenu::getList();
$pagesList = \wscvua\ws_admin_simple\models\blog\WsPages::getList();
if(!$model->isNewRecord){
    unset($menuList[$model->id]);
}
$langs = \wscvua\ws_admin_simple\models\blog\WsLangs::getList();
echo $form->field($model,'id',['options'=>['class'=>'hidden']])->hiddenInput();
echo $form->field($model, 'key', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->textInput()
    ->label(\wscvua\ws_admin_simple\Module::t('app','Key'));
echo $form->field($model, 'parent_id', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->dropDownList($menuList,['prompt'=>'...'])
    ->label(\wscvua\ws_admin_simple\Module::t('app', 'Parrent'));
echo $form->field($model, 'page_id', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->dropDownList($pagesList,['prompt'=>'...'])
    ->label(\wscvua\ws_admin_simple\Module::t('app', 'Page'));
?>

<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <? foreach($langs as $id => $code){ ?>
            <li role="presentation" <?= $code == 'ua' ? 'class="active"' : '' ?> >
                <a href="#menu-<?=$code?>"
                   id="menu-<?=$code?>-tab"
                   role="tab"
                   data-toggle="tab"
                   aria-expanded="true"><?=strtoupper($code)?></a>
            </li>
        <? } ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <? foreach ($model->items as $lang=>$item){ ?>
            <div role="tabpanel"
                 class="tab-pane fade <?= $lang == 'ua' ? "active" : '' ?> in"
                 id="menu-<?=$lang?>"
                 aria-labelledby="menu-<?=$lang?>-tab">
                 <?= $this->render('menu-item',[
                     'model' => $item,
                     'form' => $form,
                     'lang' => $lang,
                 ])?>
            </div>
        <? } ?>
    </div>
</div>
