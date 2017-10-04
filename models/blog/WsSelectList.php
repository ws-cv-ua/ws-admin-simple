<?php
namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_select_list".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $var_name
 * @property string $item_name
 * @property string $item_value
 * @property integer $index
 */
class WsSelectList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_select_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id', 'index'], 'integer'],
            [['model_class', 'item_name', 'item_value'], 'string', 'max' => 255],
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
            'item_name' => 'Item Name',
            'item_value' => 'Item Value',
            'index' => 'Index',
        ];
    }
}
