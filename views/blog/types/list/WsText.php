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

$before = '[' . $model->model_id . '][' . $model->var_name . '][new]';
?>
<div class="x_panel">
    <?= $this->render('/blog/others/x_title', [
        'title' => Module::t('app',
            isset($labels[$langCode]) && $labels[$langCode] ? $labels[$langCode] : $model->var_name)
    ]); ?>
    <div class="x_content">
        <div class="string row">
            <?= $form->field($model, $before . 'model_class', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
            <?= $form->field($model, $before . 'model_id', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
            <?= $form->field($model, $before . 'var_name', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
            <div class="col-md-11 col-sm-11 col-xs-12">
                <?= $form->field($model, $before . 'value', [
                    'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
                    'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
                ])->textarea()
                    ->label(Module::t('app', 'New'))
                ?>
            </div>
            <?= \yii\helpers\Html::submitButton(
                '', [
                'class' => 'btn-success glyphicon glyphicon-plus flr btn-round btn',
                'data' => [
                    'method' => 'post',
                    'params' => [
                        'action' => 'addString',
                    ],
                ],
            ]); ?>
            <div clas="clearfix"></div>
        </div>
        <div class="sortable-rows"
             data-model_class="<?=$model::className()?>"
             data-sort_action="<?=\yii\helpers\Url::to(['blog/sort'])?>"
        >
        <? foreach ($list as $model) {
            $before = '[' . $model->model_id . '][' . $model->var_name . '][' . $model->id . ']';
            ?>
            <div class="string row" data-key="<?=$model->id?>">
                <?= $form->field($model, $before . 'id', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
                <?= $form->field($model, $before . 'model_class', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
                <?= $form->field($model, $before . 'model_id', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
                <?= $form->field($model, $before . 'var_name', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
                <?= $form->field($model, $before . 'index', ['options' => ['class' => 'hidden']])->hiddenInput() ?>
                <div class="col-md-11 col-sm-11 col-xs-12">
                    <?= $form->field($model, $before . 'value', [
                        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
                        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
                    ])->textarea()
                        ->label('<span class="glyphicon glyphicon-move position-row"></span>')
                    ?>
                </div>
                <?= Html::submitButton('',
                    [
                        'data' => [
                            'method' => 'post',
                            'params' => [
                                'action' => 'delete',
                                'delete_id' => $model->id,
                                'delete_class' => $model->className(),
                            ],
                        ],
                        'title' => 'Delete',
                        'class' => 'btn-danger glyphicon glyphicon-trash flr btn-round btn',
                    ]
                ); ?>
                <div clas="clearfix"></div>
            </div>
        <? } ?>
        </div>
    </div>
    <div class="clearfix"></div>
</div>








