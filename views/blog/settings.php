<?php

use yii\helpers\Html;
use yii\helpers\Url;
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $langs wscvua\ws_admin_simple\models\blog\WsLangs; */
$this->title = Module::t('app', 'Settings');
$this->params['breadcrumbs'][] = ['label' => Module::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
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
                            ['create-lang'],
                            ['class' => 'create-btn']
                        ) ?>

                    </li>
                </ul>
                <h3><?= Module::t('app', 'Langs') ?></h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $langs,
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],
//                        [
//                            'label' => Module::t('app', 'Lang code'),
//                            'value' => 'code',
//                        ],
//                        [
//                            'label' => Module::t('app', 'Local code'),
//                            'value' => 'local',
//                        ],
                        [
                            'label' => Module::t('app', 'Language'),
                            'value' => function ($data) {
                                return $data->name.' ('.$data->code.'_'.$data->local.')';
                            },
                        ],
                        [
                            'label' => Module::t('app', 'Default'),
                            'value' => function ($data) {
                                return Module::t('app', $data->default ? 'Yes' : 'No');
                            },
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
                                            Url::to(['edit-lang', 'id' => $model->id]));
                                        return $html;
                                    }
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
                                            Url::to(['delete-lang', 'id' => $model->id]), [
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
                    'emptyText' => '<div class="tac no-result">'.Module::t('app','No results found').'!</div>',
                    'summary' =>
                        Module::t('app','Showing').': {begin}-{end} / '.
                        Module::t('app','Total').': {totalCount}'
                ]); ?>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12">
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
                            ['create-type'],
                            ['class' => 'create-btn']
                        ) ?>

                    </li>
                </ul>
                <h3><?= Module::t('app', 'Types') ?></h3>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $types,
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'label' => Module::t('app', 'Name'),
                            'value' => 'name',
                        ],
                        [
                            'label' => Module::t('app', 'Description'),
                            'value' => 'description',
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
                                            Url::to(['edit-type', 'id' => $model->id]));
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
                                            Url::to(['delete-type', 'id' => $model->id]), [
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
                    'emptyText' => '<div class="tac no-result">'.Module::t('app','No results found').'!</div>',
                    'summary' =>
                        Module::t('app','Showing').': {begin}-{end} / '.
                        Module::t('app','Total').': {totalCount}'
                ]); ?>
            </div>
        </div>
    </div>
</div>