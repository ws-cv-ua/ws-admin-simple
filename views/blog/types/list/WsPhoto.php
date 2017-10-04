<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wscvua\ws_admin_simple\Module;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsString */
/* @var $list wscvua\ws_admin_simple\models\blog\WsString */
/* @var $labels array */
/* @var $langCode string */
//Module::pre($model);
$langCode = \wscvua\ws_admin_simple\models\blog\WsLangs::currentCode();
$before = '[' . $model->model_id . '][' . $model->var_name . ']';
//Module::pre($list);
$preview = $previewConfig = $deleteConfig = [];
foreach ($list as $k=>$v){
    if($v->src){
        $preview[] = $v->src;
        $previewConfig[] = [
            'key' => $v->id,
            'caption' => $v->alt,
            'size' => $v->size,
        ];
        $deleteConfig = [
            'id' => $v->id,
            'class' => $v->className(),
        ];
    }
}
?>

<div class="row">
    <?= $form->field($model, $before . 'model_class', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before . 'model_id', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before . 'var_name', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
    <?= $form->field($model, $before . 'file', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']
    ])
        ->widget(\kartik\file\FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
                'data' => [
                    'model_class'=> $model->className(),
                ]

            ],
            'pluginOptions' => [
                'language' => $langCode,
                'uploadUrl' => \yii\helpers\Url::to(['blog/uploadimage']),
                'deleteUrl' => \yii\helpers\Url::to(['blog/deleteimage']),
                'uploadAsync' => true,
                'initialPreview' => $preview ? $preview : false,
                'initialPreviewAsData' => true,
                'initialPreviewConfig' => $previewConfig ? $previewConfig : false,
                'uploadExtraData' => [
                    'id'          => $model->id,
                    'class'       => $model->className(),
                    'model_class' => $model->model_class,
                    'model_id'    => $model->model_id,
                    'var_name'    => $model->var_name,
                ],
                'deleteExtraData' => $deleteConfig ? $deleteConfig : false,
                'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                'overwriteInitial' => false,
                'showPreview' => true,
                'showCaption' => true,
                'showUpload' => false,
                'showRemove' => true,
                'initialCaption' => ''
            ],
            'pluginEvents' => [
                "fileimagesloaded" => "function(event) {
                            $(this).fileinput('upload');
                        }",
                "filesorted" => "function(event, params) {
                    var serial = [];
                    var i = 0;
                    $(params.stack).each(function(key,value){
                        serial[i++] = value.key;
                    });
                    console.log($(this));
                    $.ajax({
                        type  :'POST',
                        cache : false,
                        url   : '" . \yii\helpers\Url::to(['blog/sort']) . "',
                        data  : {
                            model_class: $(this).data('model_class'),
                            serial: serial
                        },
                        success  : function(response)
                        {
                            $('#close').html(response);
                            console.log(response);
                        }
                    });
                }"
            ]
        ])
        ->label(\wscvua\ws_admin_simple\Module::t('app',
            isset($labels[$langCode]) && $labels[$langCode] ? $labels[$langCode] : $model->var_name));
    ?>

</div>








