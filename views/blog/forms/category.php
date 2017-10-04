<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsCategory */
/* @var $form ActiveForm */
//\wscvua\ws_admin_simple\Module::pre($model);
$categoryList = \wscvua\ws_admin_simple\models\blog\WsCategory::getList();
echo $form->field($model,'id',['options'=>['class'=>'hidden']])->hiddenInput();
echo $form->field($model, 'key', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->textInput()
    ->label(\wscvua\ws_admin_simple\Module::t('app','Key'));
echo $form->field($model, 'parent_id', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->dropDownList($categoryList,['prompt'=>'...'])
->label(\wscvua\ws_admin_simple\Module::t('app', 'Parrent'));
foreach (\wscvua\ws_admin_simple\models\blog\WsLangs::getList() as $lang){
    echo $form->field($model, 'names['.$lang.']', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
    ])->textInput()
        ->label(
            strtoupper($lang).' '.\wscvua\ws_admin_simple\Module::t('app','Title'));
}
?>