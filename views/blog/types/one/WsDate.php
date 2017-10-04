<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsString */
/* @var $form ActiveForm */
/* @var $form ActiveForm */
$before = '['.$model->model_id.']['.$model->var_name.']';

?>
<div class="string">
    <?= $form->field($model, $before.'model_class',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'model_id',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'var_name',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'value', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
    ])->widget(\kartik\date\DatePicker::classname(), [
        'language' => \yii::$app->language == 'ua' ? 'uk' : \yii::$app->language,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => \wscvua\ws_admin_simple\models\blog\WsLangs::dateFormat()
        ],
        'options' => [
            'placeholder' => \wscvua\ws_admin_simple\Module::t('app','Enter date and time')
        ]
    ])->label(\wscvua\ws_admin_simple\Module::t('app',
        isset($labels[$langCode]) && $labels[$langCode] ? $labels[$langCode] : $model->var_name));?>
</div>
