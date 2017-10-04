<?php
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model \wscvua\ws_admin_simple\models\blog\WsPages */
$this->title = Module::t('app','Update');
$this->params['breadcrumbs'][] = ['label' => Module::t('app','Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Module::t('app','Pages'), 'url' => ['blog/pages']];
$this->params['breadcrumbs'][] = $this->title;
if(!$model->content->isNewRecord){
    yii\widgets\Pjax::begin([
        'id' => 'page-edit-pjax',
        'timeout' => 5000
    ]);
}
$form = ActiveForm::begin([
    'options' => [
        'class' => "form-horizontal form-label-left",
        'enctype' => 'multipart/form-data',
        'data-pjax' => true
    ]
]); ?>
<div class="form-group tac fixed-buttons">
    <?= Html::submitButton(Module::t('app','Save'), [
        'class' => 'btn btn-success',
        'data' => [
            'method' => 'post',
            'params' => [
                'action' => 'save',
            ],
        ]
    ]) ?>
    <?= Html::a(Module::t('app','Cancel'), ['blog/pages'], ['class' => 'btn btn-danger']) ?>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <?= $this->render('/blog/others/x_title',[
            'title'=> Module::t('app','General')
        ]);?>
        <div class="x_content">
            <?= $this->render('../forms/page',[
                'model' => $model,
                'form' => $form,
            ]) ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_content">
            <?= $this->render('/blog/edit/seo',[
                'form'=>$form,
                'page'=>$model,
            ]);?>
        </div>
    </div>
</div>
<?php
ActiveForm::end();
if(!$model->content->isNewRecord) {
    \yii\widgets\Pjax::end();
}?>
