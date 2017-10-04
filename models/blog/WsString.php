<?php

namespace wscvua\ws_admin_simple\models\blog;

use wscvua\ws_admin_simple\Module;
use Yii;

/**
 * This is the model class for table "ws_string".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $var_name
 * @property string $value
 * @property integer $index
 * @property object $content
 */
class WsString extends WsSimpleType
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_string';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id', 'index'], 'integer'],
            [['model_class', 'value'], 'string', 'max' => 255],
            [['var_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_class' => 'Model Class',
            'model_id' => 'Model ID',
            'var_name' => 'Var Name',
            'value' => 'Value',
            'index' => 'Index',
        ];
    }

}
