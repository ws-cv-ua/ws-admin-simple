<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

    <h1><?= Html::encode($this->title) ?></h1>

<?= $form->field($model, 'username')->textInput([
    'placeholder' => $model->getAttributeLabel('username')
])->label(false) ?>

<?= $form->field($model, 'password')->passwordInput([
    'placeholder' => $model->getAttributeLabel('password')
])->label(false) ?>


    <div class="separator"></div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'rememberMe', [
                'template' => '<div class="checkbox">
                            <label>
                              {input}
                            </label>
                          </div>'
            ])->checkbox([
                'class' => 'flat'
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= Html::submitButton('Login', ['class' => 'btn btn-default submit', 'name' => 'login-button']) ?>
        </div>
    </div>


    <div class="clearfix"></div>


<?php ActiveForm::end(); ?>