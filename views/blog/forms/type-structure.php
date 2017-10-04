<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsTypesStructure */
/* @var $form ActiveForm */
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <?= $form->field($model, 'var_name', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ]])->textInput(['maxlength' => 64])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Var name'))
    ?>
    <?= $form->field($model, 'class', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
    ])->dropDownList(\wscvua\ws_admin_simple\models\blog\WsTypesStructure::classesList())
        ->label(\wscvua\ws_admin_simple\Module::t('app','Сlass name full'))
    ?>
    <?= $form->field($model, 'params', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'
        ]])->textInput(['maxlength' => 64])
        ->label(\wscvua\ws_admin_simple\Module::t('app','Params'))
    ?>
<!--    --><?//= $form->field($model, 'labels', [
//        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
//        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
//    ])->textInput(['maxlength' => 255])
//        ->label(\wscvua\ws_admin_simple\Module::t('app','Labels'))
//    ?>
    <? foreach (\wscvua\ws_admin_simple\models\blog\WsLangs::getList() as $lang){
        echo $form->field($model, 'labels['.$lang.']',[
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
        ])->label(\wscvua\ws_admin_simple\Module::t('app','Title').' '.strtoupper($lang));
    }?>

    <?= $form->field($model, 'is_list', [
        'template' => "{label}\n<div class='col-md-3 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
    ])->checkbox([
        'label' => '',
        'class' => 'js-switch',
    ])->label(\wscvua\ws_admin_simple\Module::t('app', 'List'))
    ?>
</div>