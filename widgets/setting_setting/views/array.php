<?php
/**
 * @var $this \yii\web\View
 * @var $models \wscvua\ws_admin_simple\models\SettingForm
 * @var $type integer
 * @var $labels array
 * @var $keys array
 */
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wscvua\ws_admin_simple\Module;
use \wscvua\ws_admin_simple\widgets\setting_setting\SettingSetWidget;
?>

<?php Pjax::begin(); ?>
<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>
<?php if ($message = Yii::$app->session->getFlash('success-setting-' . implode('-',$keys))): ?>
    <div class="alert alert-success alert-dismissible fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Module::t('app', $message); ?>
    </div>
<?php endif; ?>
<?  foreach ($keys as $index => $key){
        $model = $models[$key];
        echo $this->render('_form',[
            'key' => $key,
            'form' => $form,
            'model' => $model,
            'type' => $type,
            'label' => $labels[$index],
        ]);
    }
?>
<?= Html::submitButton(Module::t('app', 'Save'), ['class' => 'btn btn-primary']); ?>

<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>