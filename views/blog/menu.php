<?php
use \kartik\tree\TreeView;
use \wscvua\ws_admin_simple\Module;
/* @var $this yii\web\View */
/* @var $tree array */
$this->title = \wscvua\ws_admin_simple\Module::t('app', 'Menu');
$this->params['breadcrumbs'][] = ['label' => \wscvua\ws_admin_simple\Module::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <? \yii\widgets\Pjax::begin() ?>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <div class="x_title">
                <div class="navbar-right">
                    <?= \yii\helpers\Html::submitButton('', [
                        'class' => 'create-btn btn-success glyphicon glyphicon-plus flr btn-round btn',
                        'data' => [
                            'method' => 'post',
                            'pjax' => true,
                            'params' => [
                                'action' => 'new',
                            ],
                        ]
                    ]) ?>
                </div>
                <h2><?= Module::t('app', 'Menu') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= $this->render('forms/tree',[
                    'tree'     => $tree,
                    'lvl'      => 0,
                    'sort_action'  => \yii\helpers\Url::to(['blog/sort-tree']),
                    'modelClass' => \wscvua\ws_admin_simple\models\blog\WsMenu::className(),
                    'langCode' => \wscvua\ws_admin_simple\models\blog\WsLangs::currentCode()
                ]) ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="x_panel">
            <? $form = \yii\widgets\ActiveForm::begin([
                'options' => [
                    'class' => "form-horizontal form-label-left",
                    'data-pjax' => true
                ]
            ]); ?>
            <div class="x_title">
                <h2><?= Module::t('app', $model->isNewRecord ? 'New category' : 'Edit category') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= $this->render('forms/menu',[
                    'model'=>$model,
                    'form'=>$form,
                ])?>
                <div class="tac">
                    <?= \yii\helpers\Html::submitButton(Module::t('app','Save'), [
                        'class' => 'btn btn-success',
                        'data' => [
                            'method' => 'post',
                            'params' => [
                                'action' => 'save',
                                'model_id' => $model->id,
                            ],
                        ]
                    ]) ?>
                    <?= \yii\helpers\Html::a(Module::t('app','Cancel'), ['blog/menu'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
            <? \yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
    <? \yii\widgets\Pjax::end() ?>
</div>