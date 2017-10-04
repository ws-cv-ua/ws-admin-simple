<?php
use yii\helpers\Html;
use yii\helpers\Url;
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $blog \yii\data\ActiveDataProvider */
/* @var $services \yii\data\ActiveDataProvider */
/* @var $others \yii\data\ActiveDataProvider */
/* @var $this yii\web\View */

$this->title = Module::t('app', 'Blog').' - '.Module::t('app', 'Dashboard');
?>
<div class="site-index">
    <div class="page-title">
         <h1><?=$this->title?></h1>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="navbar-right">
                    <?= \yii\helpers\Html::a(
                        '<span class="btn btn-round btn-success glyphicon glyphicon-plus"></span>',
                        ['create-page','type_id'=>1],
                        ['class' => 'create-btn']
                    ) ?>
                </div>
                <h2><?= Module::t('app', 'News') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $blog,
                    'columns' => [
                        [
                            'label' => Module::t('app', 'Name'),
                            'value' => 'name',
                        ],
                        [
                            'label' => Module::t('app', 'Сomment'),
                            'value' => 'comment',
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
                                            Url::to(['edit-page', 'id' => $model->id]));
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
                                            Url::to(['delete-page', 'id' => $model->id]), [
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
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="navbar-right">
                    <?= \yii\helpers\Html::a(
                        '<span class="btn btn-round btn-success glyphicon glyphicon-plus"></span>',
                        ['create-page','type_id'=>9],
                        ['class' => 'create-btn']
                    ) ?>
                </div>
                <h2><?= Module::t('app', 'Services') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $services,
                    'columns' => [
                        [
                            'label' => Module::t('app', 'Name'),
                            'value' => 'name',
                        ],
                        [
                            'label' => Module::t('app', 'Сomment'),
                            'value' => 'comment',
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
                                            Url::to(['edit-page', 'id' => $model->id]));
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
                                            Url::to(['delete-page', 'id' => $model->id]), [
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
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <div class="navbar-right">
                    <?= \yii\helpers\Html::a(
                        '<span class="btn btn-round btn-success glyphicon glyphicon-plus"></span>',
                        ['create-page','type_id'=>9],
                        ['class' => 'create-btn']
                    ) ?>
                </div>
                <h2><?= Module::t('app', 'Others') ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= GridView::widget([
                    'dataProvider' => $others,
                    'columns' => [
                        [
                            'label' => Module::t('app', 'Name'),
                            'value' => 'name',
                        ],
                        [
                            'label' => Module::t('app', 'Сomment'),
                            'value' => 'comment',
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
                                            Url::to(['edit-page', 'id' => $model->id]));
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
                                            Url::to(['delete-page', 'id' => $model->id]), [
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
