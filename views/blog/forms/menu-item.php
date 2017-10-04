<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsMenuItems */
/* @var $form ActiveForm */
/* @var $lang string */
?>
<?= $form->field($model, '['.$lang.']id',[
    'options'=>[
        'class'=>'hidden'
    ]])->hiddenInput()
?>
<?= $form->field($model, '['.$lang.']menu_id',[
    'options'=>[
        'class'=>'hidden'
    ]])->hiddenInput()
?>
<?= $form->field($model, '['.$lang.']lang_id',[
    'options'=>[
        'class'=>'hidden'
    ]])->hiddenInput()
?>
<?= $form->field($model, '['.$lang.']show', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->checkbox([
    'label' => '',
    'class' => 'js-switch',
])->label(
    \wscvua\ws_admin_simple\Module::t('app','Show')
); ?>
<?= $form->field($model, '['.$lang.']name', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->textInput()
    ->label(
        \wscvua\ws_admin_simple\Module::t('app','Title')
    ); ?>
<?= $form->field($model, '['.$lang.']link', [
    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
])->textInput([
    'placeholder' => '#contacts ... ?categoty=new'
])
    ->label(
        \wscvua\ws_admin_simple\Module::t('app','Link params')
    ); ?>