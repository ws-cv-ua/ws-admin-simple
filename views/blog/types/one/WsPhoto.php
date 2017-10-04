<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsString */
/* @var $form ActiveForm */
/* @var $langCode string */
$before = '['.$model->model_id.']['.$model->var_name.']';

//\wscvua\ws_admin_simple\Module::pre($model);
?>
<div class="string">
    <?= $form->field($model, $before.'model_class',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'model_id',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'var_name',['options'=>['class'=>'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before.'file' ,[
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
        ])
        ->widget(\kartik\file\FileInput::classname(), [
            'options' => ['accept' => 'image/*','multiple'=>false],
            'pluginOptions' => [
                'language'              => $langCode,
                'uploadUrl'             => \yii\helpers\Url::to(['blog/uploadimage']),
                'deleteUrl'             => \yii\helpers\Url::to(['blog/deleteimage']),
                'initialPreview'        => $model->src ? $model->src : false,
                'initialPreviewAsData'  => true,
                'initialPreviewConfig'  => $model->src ? [
                    [
                        'key' => $model->id,
                        'caption' => $model->alt,
                        'size' => $model->size,
                    ]
                ] : false,
                'uploadExtraData'       => [
                    'id' => $model->id,
                    'class' => $model->className(),
                    'model_class' => $model->model_class,
                    'model_id' => $model->model_id,
                    'var_name' => $model->var_name,
                ],
                'deleteExtraData'       => [
                    'id' => $model->id,
                    'class' => $model->className(),
                ],
                'allowedFileExtensions' => ['jpg','png','gif'],
                'overwriteInitial'      => false,
                'showPreview'           => true,
                'showCaption'           => true,
                'showUpload'            => false,
                'showRemove'            => true,
                'initialCaption'        => ''
            ],
            'pluginEvents' =>  [
                "fileimagesloaded" => "function(event) {
                    $(this).fileinput('upload');
                }"
            ]
        ])
        ->label(\wscvua\ws_admin_simple\Module::t('app',
            isset($labels[$langCode]) && $labels[$langCode] ? $labels[$langCode] : $model->var_name));

    ?>
</div>
