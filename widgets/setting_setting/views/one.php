<?php
/**
 * @var $this \yii\web\View
 * @var $model \wscvua\ws_admin_simple\models\SettingForm
 * @var $type integer
 * @var $label string
 */
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wscvua\ws_admin_simple\Module;
use \wscvua\ws_admin_simple\widgets\setting_setting\SettingSetWidget;

?>

<?php Pjax::begin(); ?>
<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true]]); ?>

<?php if ($message = Yii::$app->session->getFlash('success-setting-' . $model->key)): ?>
    <div class="alert alert-success alert-dismissible fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?= Module::t('app', $message); ?>
    </div>
<?php endif;
    echo $this->render('_form',[
        'form' => $form,
        'model' => $model,
        'type' => $type,
        'label' => $label
    ]);
?>
<?= Html::submitButton(Module::t('app', 'Save'), ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>