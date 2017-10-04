<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsModelHistory */
/* @var $form ActiveForm */
?>
<div class="model-history">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'model_class') ?>
        <?= $form->field($model, 'model_id') ?>
        <?= $form->field($model, 'description') ?>
        <?= $form->field($model, 'date_at') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- model-history -->
