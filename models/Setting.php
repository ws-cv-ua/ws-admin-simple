<?php

namespace wscvua\ws_admin_simple\models;

use wscvua\ws_admin_simple\Module;
use Yii;

/**
 * This is the model class for table "{{%setting}}".
 *
 * @property string $key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%setting}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'string', 'max' => 50],
            [['value'], 'string', 'max' => 255],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => Module::t('app', 'Key'),
            'value' => Module::t('app', 'Value'),
        ];
    }

    public static function findValue($key)
    {
        $model = self::findByKey($key);
        return $model->value;
    }

    public static function findByKey($key)
    {
        $model = self::find()->where(['key' => $key])->one();
        if (!$model)
            $model = new self(['key' => $key]);
        return $model;
    }

    public static function findByKeys($keys=[])
    {
        $models = self::getByKeys($keys);
        foreach ($models as $key => $model){
            if(!$model){
                $models[$key] = new self(['key' => $key]);
            }
        }
        return $models;
    }

    public static function getValues($keys = []){
        $out = [];
        $models = self::getByKeys($keys);
        foreach ($models as $key => $model){
            $out[$key] = $model->value;
        }
        return $out;
    }

    public static function getByKeys($keys = []){
        $out = [];
        $models = self::find()->where(['key' => $keys])->all();
        foreach ($models as $model){
            $out[$model->key] = $model;
        }
        foreach ($keys as $key){
            if(!isset($out[$key])){
                $out[$key] = null;
            }
        }
        return $out;
    }



}
