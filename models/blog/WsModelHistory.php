<?php

namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_model_history".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $description
 * @property string $date_at
 */
class WsModelHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_model_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id'], 'integer'],
            [['description'], 'string'],
            [['date_at'], 'safe'],
            [['model_class'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'date_at' => 'Date At',
        ];
    }
}
