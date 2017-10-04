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
class WsSimpleType extends \yii\db\ActiveRecord
{
    public function getCount(){
        return self::find()->where([
            'model_class' => $this->model_class,
            'model_id' => $this->model_id,
            'var_name' => $this->var_name,
        ])->count();
    }

    function beforeSave($insert)
    {
        if($this->isNewRecord || $this->index === null){
            $this->index = $this->count;
        }
        return parent::beforeSave($insert);
    }

    function getContent(){
        $model = new $this->model_class();
        $content = $model->find()->where(['id'=>$this->model_id]);
        if($content){
            return $content;
        }
        return $model;
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $this->reindex();
    }

    public function reindex(){
        $all = self::find()->where([
            'model_class' => $this->model_class,
            'model_id' => $this->model_id,
            'var_name' => $this->var_name,
        ])->orderBy(['index'=>SORT_ASC])
        ->all();
        $begin = 0;
        foreach ($all as $model){
            $model->index = $begin++;
            $model->save();
        }
    }
}
