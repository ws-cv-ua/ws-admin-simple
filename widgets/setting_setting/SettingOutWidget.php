<?php

namespace wscvua\ws_admin_simple\widgets\setting_setting;

use wscvua\ws_admin_simple\Module;
use Yii;
use wscvua\ws_admin_simple\models\Setting;
use wscvua\ws_admin_simple\models\SettingForm;
use yii\helpers\ArrayHelper;

class SettingOutWidget extends \yii\base\Widget
{
    const TYPE_INPUT   = 0;
    const TYPE_TEXT    = 1;
    const TYPE_BOOLEAN = 2;
    const TYPE_ARTICLE = 3;

    public $key = 'test_value';
    public $type = 0;

    protected $model = null;

    public function init()
    {
         $this->model = Setting::findByKey($this->key);
    }

    public function run()
    {
        /** @var SettingForm $model */
        $model = $this->model;
        return $this->render('out', [
            'model' => $model,
            'type'  => $this->type,
        ]);
    }

}