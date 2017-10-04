<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsString */
/* @var $form ActiveForm */
/* @var $langCode string */
$before = '['.$model->model_id.']['.$model->var_name.']';
?>
<div class="row">
    <?= $form->field($model, $before.'model_class',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'model_id',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'var_name',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <label class="col-md-3 col-sm-3 col-xs-12 control-label">
        <?=\wscvua\ws_admin_simple\Module::t('app',
            isset($labels[$langCode]) && $labels[$langCode] ? $labels[$langCode] : $model->var_name)
        ?>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-8" >
        <?= $form->field($model, $before.'models_class', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-10 pad-0-5'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'options' => [
                'tag' => null, // Don't wrap with "form-group" div
            ],
        ])->dropDownList(
            \wscvua\ws_admin_simple\models\blog\WsTypes::getList(),[
                'prompt' => 'type ...'
        ])->label(false)?>
        <?= $form->field($model, $before.'models_ids',[
            'template' => "{label}\n<div class='col-md-3 col-sm-3 col-xs-3'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-2 col-xs-2'],
            'options' => [
                'tag' => null, // Don't wrap with "form-group" div
            ],
        ])->textInput([
            'maxlength' => 255,
            'placeholder' => 'Ids: "13" ... "1,12,13" ... "all"'
        ])->label(false ) ?>
    </div>
</div>

