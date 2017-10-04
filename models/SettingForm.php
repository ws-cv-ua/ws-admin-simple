<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31.07.2017
 * Time: 22:33
 */

namespace wscvua\ws_admin_simple\models;

use yii\base\Model;

class SettingForm extends Model
{

    public $key;
    public $value;

    public function rules()
    {
        return [
            [['key', 'value'], 'required']
        ];
    }

    public function save()
    {
        $model = Setting::findByKey($this->key);
        $model->value = $this->value;
        return $model->save();
    }

}