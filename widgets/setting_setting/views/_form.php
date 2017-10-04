<?
use \wscvua\ws_admin_simple\widgets\setting_setting\SettingSetWidget;
/**
 * @var $this \yii\web\View
 * @var $model \wscvua\ws_admin_simple\models\SettingForm
 * @var $type integer
 * @var $label string
 * @var $lang string
 * @var $key string
 */
$before = isset($key) && $key ? '['.$key.']' : '';
echo $form->field($model, $before.'key')->hiddenInput()->label(false);
switch ($type){
    case SettingSetWidget::TYPE_TEXT:
        echo $form->field($model, $before.'value',[
            'template' => "{label}\n<div class='col-md-10 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-3 col-xs-12 tar'],
        ])->textarea([
            'id' => 'settings-value-'.$model->key
        ])->label($label);
        break;
    case SettingSetWidget::TYPE_BOOLEAN:
        echo $form->field($model, $before.'value', [
            'template' => "{label}\n<div class='col-md-10 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-3 col-xs-12 tar'],
        ])->checkbox([
            'label' => '',
            'class' => 'js-switch',
            'options' => [
                'id' => 'settings-value-'.$model->key
            ]
        ])->label($label);
        break;
    case SettingSetWidget::TYPE_ARTICLE:
        echo $form->field($model, $before.'value', ['options' => [
            'template' => "{label}\n<div class='col-md-10 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-3 col-xs-12 tar'],
        ]])->widget(\yii\redactor\widgets\Redactor::className(),[
            'clientOptions' => [
                'plugins' => ['clips', 'fontcolor','imagemanager']
            ],'options' => [
                'id' => 'settings-value-'.$model->key
            ]
        ])->label($label);
        break;
    case SettingSetWidget::TYPE_INPUT:
    default:
        echo $form->field($model, $before.'value',[
            'template' => "{label}\n<div class='col-md-10 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-2 col-sm-3 col-xs-12 tar'],
        ])->textInput([
            'id' => 'settings-value-'.$model->key
        ])->label($label);
        break;
}
?>