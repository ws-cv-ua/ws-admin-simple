<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsLangs */
/* @var $form ActiveForm */
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <?= $form->field($model, 'code', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textInput(['maxlength' => 4])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Lang code'))
    ?>
    <?= $form->field($model, 'local', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
        ])->textInput(['maxlength' => 10])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Local code'))
    ?>
    <?= $form->field($model, 'name', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ]])->textInput(['maxlength' => 64])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Name'))
    ?>
    <?= $form->field($model, 'default', [
        'template' => "{label}\n<div class='col-md-3 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']])
        ->checkbox([
            'label' => '',
            'class' => 'js-switch',
        ])->label(\wscvua\ws_admin_simple\Module::t('app','Default'))
    ?>
</div>