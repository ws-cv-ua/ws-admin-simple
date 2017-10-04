<?php

namespace wscvua\ws_admin_simple\widgets\setting_setting;

use wscvua\ws_admin_simple\Module;
use Yii;
use wscvua\ws_admin_simple\models\Setting;
use wscvua\ws_admin_simple\models\SettingForm;
use yii\helpers\ArrayHelper;

class SettingSetWidget extends \yii\base\Widget
{
    const TYPE_INPUT   = 0;
    const TYPE_TEXT    = 1;
    const TYPE_BOOLEAN = 2;
    const TYPE_ARTICLE = 3;

    public $key = 'test_value';
    public $keys = [];
    public $type = 0;
    public $types = [];
    public $label = false;
    public $labels = [];
    public $submitNutton = true;

    protected $model = null;
    protected $models = [];

    public function init()
    {
        if($this->keys){
            $this->models = Setting::findByKeys($this->keys);
        }else{
            $this->model = Setting::findByKey($this->key);
        }
    }

    public function run()
    {
        /** @var SettingForm $model */
        if($this->keys){
            $models = $this->models;
            $post = ArrayHelper::getValue(Yii::$app->request->post(), 'Setting');
            if($post){
                $keys = implode('-',$this->keys);
                foreach ($models as $key => $model){
                    if(isset($post[$key])){
                        $model->attributes = $post[$key];
                        $model->save();
                    }
                }
                Yii::$app->session->setFlash('success-setting-' . $keys, 'Updated');
            }
            return $this->render('array', [
                'keys' => $this->keys,
                'models' => $this->models,
                'labels' => $this->labels,
                'type'  => $this->type,
            ]);

        }else{
            $model = $this->model;
            $key = ArrayHelper::getValue(Yii::$app->request->post(), 'Setting.key');
            if($key == $this->key){
                $value = ArrayHelper::getValue(Yii::$app->request->post(), 'Setting.value');
                if (isset($value)) {
                    $model->value = $value;
                    if ($model->validate() && $model->save()) {
                        Yii::$app->session->setFlash('success-setting-' . $this->key, 'Updated');
                    }
                }
            }
            return $this->render('one', [
                'model' => $model,
                'type'  => $this->type,
                'label' => $this->label,
                'labels' => $this->labels,
            ]);
        }
    }

}