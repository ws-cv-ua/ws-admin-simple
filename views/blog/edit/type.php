<?php

use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model \wscvua\ws_admin_simple\models\blog\WsTypes */
/* @var $structure \wscvua\ws_admin_simple\models\blog\WsTypesStructure */
$this->title = Module::t('app', 'Edit type');
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Settings'), 'url' => ['blog/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6 col-xs-12">
    <div class="x_content">
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
                <?= $this->render('../forms/types', [
                    'model' => $model,
                    'form' => $form,
                ]) ?>
                <div class="form-group tac">
                    <?= Html::submitButton(Module::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    <?= Html::a(Module::t('app', 'Cancel'), ['blog/settings'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<div class="col-md-6 col-xs-12">
    <div class="x_content">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li class="flr">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </li>
                    <li>
                        <?= \yii\helpers\Html::a(
                            '<span class="btn btn-round btn-success glyphicon glyphicon-plus"></span>',
                            ['create-type-structure', 'type_id' => $model->id],
                            ['class' => 'create-btn']
                        ) ?>
                    </li>
                </ul>
                <h2><?= Module::t('app', 'Fields') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $structure,
                    'options' => [
                        'class'=> 'sortable-table',
                        'data'=>[
                            'model_class' => \wscvua\ws_admin_simple\models\blog\WsTypesStructure::className(),
                            'sort_action' => Url::to(['blog/sort']),
                        ]
                    ],
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => Module::t('app', 'Var name'),
                            'value' => 'var_name',
                        ],
                        [
                            'label' => Module::t('app', 'Сlass name'),
                            'value' => 'className',
                        ],
                        [
                            'label' => Module::t('app', 'List'),
                            'value' => function ($val) {
                                return Module::t('app', $val->is_list ? 'Yes' : 'No');
                            },
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'headerOptions'  => ['class' => 'tac position-column'],
                            'contentOptions' => ['class' => 'tac position-column'],
                            'template' =>
                                ' {move}' ,
                            'buttons' => [
                                'move' => function ($url, $model) {
                                    return '<span class="glyphicon glyphicon-move"></span>';
                                }
                            ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
//                            'header' => Module::t('app', 'Edit'),
                            'headerOptions' => ['class' => 'tac edit'],
                            'contentOptions' => ['class' => 'tac edit'],
                            'template' =>
                                '{edit}',
                            'buttons' =>
                                [
                                    'edit' => function ($url, $model) {
                                        $html = Html::a(
                                            '<span class="glyphicon glyphicon-pencil"></span>',
                                            Url::to(['edit-type-structure', 'id' => $model->id]));
                                        return $html;
                                    },
                                ]
                        ],
                        [
                            'class' => 'yii\grid\ActionColumn',
//                            'header' => Module::t('app', 'Delete'),
                            'headerOptions' => ['class' => 'tac delete'],
                            'contentOptions' => ['class' => 'tac delete'],
                            'template' =>
                                '{delete}',
                            'buttons' =>
                                [
                                    'delete' => function ($url, $model) {
                                        return Html::a(
                                            '<span class="glyphicon glyphicon-trash"></span>',
                                            Url::to(['delete-type-structure', 'id' => $model->id]), [
                                            'title' => Module::t('app', 'Delete'),
                                            'aria-label' => Module::t('app', 'Delete'),
                                            'data-confirm' => Module::t('app', 'Are you sure you want to delete this page?'),
                                            'data-pjax' => 0,
                                            'data-method' => 'post',
                                        ]);
                                    },
                                ]
                        ],
                    ],
                    'emptyText' => '<div class="tac no-result">' . Module::t('app', 'No results found') . '!</div>',
                    'summary' =>
                        Module::t('app', 'Showing') . ': {begin}-{end} / ' .
                        Module::t('app', 'Total') . ': {totalCount}'
                ]); ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>