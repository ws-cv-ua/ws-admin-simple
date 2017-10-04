<?php
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = Module::t('app','New type');
$this->params['breadcrumbs'][] = ['label' => Module::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('app','Settings'), 'url' => ['blog/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="x_content col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $this->title ?></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li class="flr">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <?php $form = ActiveForm::begin([
            'options' => [
                'class' => "form-horizontal form-label-left"
            ]
        ]); ?>
        <div class="x_content">
            <?= $this->render('../forms/types',[
                'model' => $model,
                'form' => $form,
            ]) ?>
        </div>
        <div class="clearfix"></div>
        <div class="form-group tac">
            <?= Html::submitButton(Module::t('app','Save'), ['class' => 'btn btn-success']) ?>
            <?= Html::a(Module::t('app','Cancel'), ['blog/pages'], ['class' => 'btn btn-danger']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>