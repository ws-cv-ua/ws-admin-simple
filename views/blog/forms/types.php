<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsTypes */
/* @var $form ActiveForm */
?>
<div class="col-md-12 col-sm-12 col-xs-12">
        <?= $form->field($model, 'name', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ]])->textInput(['maxlength' => 64])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Name'))
    ?>
    <?= $form->field($model, 'view_file', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
    ])->textInput(['maxlength' => 255])
        ->label(\wscvua\ws_admin_simple\Module::t('app','View file'))
    ?>
    <?= $form->field($model, 'description', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
    ])->textInput(['maxlength' => 255])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Description'))
    ?>
</div>