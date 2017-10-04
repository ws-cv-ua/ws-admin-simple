<?php
/**
 * @var $this \yii\web\View
 * @var $model \wscvua\ws_admin_simple\models\SettingForm
 * @var $type integer
 */

use wscvua\ws_admin_simple\Module;
use \wscvua\ws_admin_simple\widgets\setting_setting\SettingOutWidget;

$out = '';
switch ($type) {
    case SettingOutWidget::TYPE_BOOLEAN :
        $out = Module::t('app', $model->value ? 'Yes' : 'No');
        break;
    case SettingOutWidget::TYPE_ARTICLE:
    case SettingOutWidget::TYPE_TEXT :
    case SettingOutWidget::TYPE_INPUT:
    default:
        $out = $model->value;
}
return $out;
?>