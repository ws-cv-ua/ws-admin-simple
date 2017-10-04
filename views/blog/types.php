<?php
use yii\helpers\Html;
use yii\helpers\Url;
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;
/* @var $this yii\web\View */
$this->title = Module::t('app','Page types');
$this->params['breadcrumbs'][] = ['label' => Module::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="navbar-right">
                        <?= \yii\helpers\Html::a(
                        '<span class="btn btn-round btn-success glyphicon glyphicon-plus"></span>',
                        ['create-page'],
                        ['class'=>'create-btn']
                        ) ?>
                    </div>
                    <h2><?=Module::t('app', 'Pages')?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?= GridView::widget([
                        'dataProvider' => $pages,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'label' => Module::t('app','Title'),
                                'value' => 'name',
                            ],
                            [
                                'label' => Module::t('app','Author'),
                                'value' => 'user.username',
                            ],
                            [
                                'label' => Module::t('app','Сomment'),
                                'value' =>'comment',
                            ],
                            [
                                'label' => Module::t('app','Published'),
                                'value' => function($data){
                                    return Module::t('app', $data->published ? 'Yes' : 'No' );
                                },
                            ],
                            [
                                'label' => Module::t('app','Created'),
                                'value' => 'created_at',
                            ],
                            [
                                'label' => Module::t('app','Updated'),
                                'value' => 'updated_at',
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => Module::t('app','Edit'),
                                'headerOptions'  => ['class' => 'tac edit'],
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
                                'header' => Module::t('app','Delete'),
                                'headerOptions'  => ['class' => 'tac delete'],
                                'contentOptions' => ['class' => 'tac delete'],
                                'template' =>
                                    '{delete}',
                                'buttons' =>
                                    [
                                        'delete' => function ($url, $model) {
                                            return Html::a(
                                                '<span class="glyphicon glyphicon-trash"></span>',
                                                Url::to(['delete-page', 'id' => $model->id]),[
                                                    'title' => Module::t('app','Delete'),
                                                    'aria-label' => Module::t('app','Delete'),
                                                    'data-confirm' => Module::t('app','Are you sure you want to delete this page?'),
                                                    'data-pjax' => 0,
                                                    'data-method' => 'post',
                                                ]);
                                        },
                                    ]
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>