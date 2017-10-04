<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsContent */
/* @var $form ActiveForm */
//\wscvua\ws_admin_simple\Module::pre($model->attributes);
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, '['.$model->lang_id.']title', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textInput(['maxlength' => 255])
            ->label(\wscvua\ws_admin_simple\Module::t('app', 'Title'))
        ?>
        <?= $form->field($model, '['.$model->lang_id.']link', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textInput(['maxlength' => 255])
            ->label(\wscvua\ws_admin_simple\Module::t('app', 'Link'))
        ?>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
<!--        --><?//= $model->fileSrc ? '<img src="'.$model->fileSrc.'" class="flr seo-img" />' : '' ?>
        <?= $form->field($model, '['.$model->lang_id.']published', [
            'template' => "{label}\n<div class='col-md-3 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->checkbox([
            'label' => '',
            'class' => 'js-switch',
        ])->label(\wscvua\ws_admin_simple\Module::t('app', 'Published'))
        ?>
<!--        --><?//= $form->field($model, '['.$model->lang_id.']imageFile', [
//            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>".
//                ($model->fileSrc ? '<img src="'.$model->fileSrc.'" class="flr seo-img" />' : '').
//                "{input}\n{hint}\n{error}</div>",
//            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
//        ])->fileInput()
//            ->label(\wscvua\ws_admin_simple\Module::t('app', 'Image for seo'))
//        ?>
        <?= $form->field($model, '['.$model->lang_id.']imageFile' ,[
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
            'options' =>[
                'class'=> 'no-caption'
            ]
        ])
            ->widget(\kartik\file\FileInput::classname(), [
                'options' => [
                    'accept' => 'image/*',
                    'multiple' => false,
                ],'pluginOptions' => [
                    'language'              => \yii::$app->language,
                    'initialPreview'        => $model->fileSrc ? $model->fileSrc : false,
                    'initialPreviewAsData'  => true,
                    'initialPreviewConfig'  => $model->fileSrc ? [
                        [
                            'key' => $model->id,
//                            'caption' => $model->alt,
//                            'size' => $model->size,
                        ]
                    ] : false,
                    'allowedFileExtensions' => ['jpg','png','gif'],
                    'overwriteInitial'      => false,
                    'showPreview'           => true,
                    'showCaption'           => true,
                    'showUpload'            => false,
                    'showRemove'            => false,
                    'initialCaption'        => ''
                ],
//                'pluginEvents' =>  [
//                    "fileimagesloaded" => "function(event) {
//                    $(this).fileinput('upload');
//                }"
//                ]
            ])
            ->label(\wscvua\ws_admin_simple\Module::t('app','Image for seo'));
        ?>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, '['.$model->lang_id.']description', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textarea(['maxlength' => 64])
            ->label(\wscvua\ws_admin_simple\Module::t('app', 'Description'))
        ?>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <?= $form->field($model, '['.$model->lang_id.']key_words', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textarea(['maxlength' => 64])
            ->label(\wscvua\ws_admin_simple\Module::t('app', 'Key words'))
        ?>
    </div>
</div>
