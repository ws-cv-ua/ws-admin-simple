<?php

namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_photo".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $var_name
 * @property string $src
 * @property string $alt
 * @property integer $size
 * @property integer $index
 */
class WsPhoto extends WsSimpleType
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id', 'index'], 'integer'],
            [['model_class', 'src', 'alt'], 'string', 'max' => 255],
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
            'src' => 'Src',
            'alt' => 'Alt',
            'index' => 'Index',
        ];
    }

    public function getValue(){
        return $this->src;
    }

    public function getSize(){
        $path = \Yii::getAlias('@frontend/web/');
        if(file_exists($path.$this->src)){
            return filesize($path.$this->src);
        }else{
            return false;
        }
    }

    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }
        $this->deleteFile();
        return true;
    }

    public function deleteFile()
    {
        if($this->src){
            $file = Yii::getAlias('@frontend/web/'.$this->src);
            if(!is_dir($file) && file_exists($file)){
                unlink($file);
            }
        }
        return true;
    }
}
