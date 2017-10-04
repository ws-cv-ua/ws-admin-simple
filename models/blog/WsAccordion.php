<?php
namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_accordion".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $var_name
 * @property string $title
 * @property string $text
 * @property integer $index
 */
class WsAccordion extends WsSimpleType
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_accordion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id', 'index'], 'integer'],
            [['text'], 'string'],
            [['model_class', 'title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'text' => 'Text',
            'index' => 'Index',
        ];
    }

    public function getValue(){
        if($this->title || $this->text) {
            return [
                'title' => $this->title,
                'text' => $this->text,
            ];
        }
        return false;
    }
}
