<?php

namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_models".
 *
 * @property integer $id
 * @property string $model_class
 * @property integer $model_id
 * @property string $var_name
 * @property string $models_class
 * @property string $models_ids
 * @property integer $index
 * @property object $models
 * @property string | array | null $ids
 */
class WsModels extends WsSimpleType
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_models';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_class', 'model_id'], 'required'],
            [['model_id', 'index'], 'integer'],
            [['model_class', 'models_class', 'models_ids'], 'string', 'max' => 255],
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
            'models_class' => 'Models Class',
            'models_ids' => 'Models Ids',
            'index' => 'Index',
        ];
    }

    public function getValue(){
        return [
            'modelsClass' => $this->models_class,
            'modelsId' => $this->models_ids,
            'models' => $this->models,
        ];
    }

    public function getModels(){
        if($this->models_class && $this->ids) {
            $newModel = new $this->models_class();
            if ($this->ids == 'all') {
                $model = $newModel->find()->all();
            } else {
                $model = $newModel->find()->where(['id' => $this->ids])->all();
            }
            return $model;
        }
        return null;
    }

    public function getIds(){
        $ids = str_replace(' ','',$this->models_ids);
        if($ids == 'all'){
            return 'all';
        }
        if($ids == ''){
            return null;
        }
        $ids = explode(',',$ids);
        if(is_array($ids)){
            return $ids;
        }else{
            return [$ids];
        }
    }
}
