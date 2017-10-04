<?php

namespace wscvua\ws_admin_simple\models\blog;

use wscvua\ws_admin_simple\Module;
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
class WsTypeModel extends WsModels
{
    public function getValue(){
        return [
            'modelsType' => $this->models_class,
            'modelsId' => $this->models_ids,
            'models' => $this->models,
        ];
    }
    public function getModels(){
        if($this->models_class && $this->ids) {
            $type = WsTypes::find()->where(['id'=>$this->models_class])->one();
            if($type){
                if ($this->ids == 'all') {
                    $model = WsPages::find()->where([
                        'type_id'=>$type->id
                    ])->all();
                } else {
                    $model = WsPages::find()->where([
                        'type_id'=>$type->id,
                        'id'=>$this->ids,
                    ])->all();
                }
                return $model;
            }

        }
        return null;
    }
}
