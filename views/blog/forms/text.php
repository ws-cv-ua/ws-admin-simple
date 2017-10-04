<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsText */
/* @var $form ActiveForm */
?>
<div class="text">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'model_class') ?>
        <?= $form->field($model, 'model_id') ?>
        <?= $form->field($model, 'index') ?>
        <?= $form->field($model, 'value') ?>
        <?= $form->field($model, 'var_name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- text -->
