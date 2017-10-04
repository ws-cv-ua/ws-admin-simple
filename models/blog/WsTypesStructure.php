<?php
namespace wscvua\ws_admin_simple\models\blog;

use wscvua\ws_admin_simple\Module;
use Yii;

/**
 * This is the model class for table "ws_types_structure".
 *
 * @property integer $id
 * @property integer $type_id
 * @property string $var_name
 * @property string $class
 * @property string $params
 * @property string $index
 * @property string $labels
 * @property integer $is_list
 */
class WsTypesStructure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_types_structure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'var_name', 'class'], 'required'],
            [['type_id', 'is_list','index'], 'integer'],
            [['var_name'], 'string', 'max' => 64],
            [['class', 'params',], 'string', 'max' => 255],
            ['labels', 'each', 'rule' => ['string']],
        ];
    }

    public static function classesList(){
        return[
            WsArticle::className() => 'Article',
            WsString::className() => 'String',
            WsPhoto::className() => 'Photo',
            WsText::className() => 'TextArea',
            WsBoolean::className() => 'CheckBox',
            WsAccordion::className() => 'Accordion',
            WsDate::className() => 'Date',
            WsTime::className() => 'Time',
            WsDateTime::className() => 'DateTime',
            WsModels::className() => 'Models',
            WsTypeModel::className() => 'TypeModel',
            WsPagesCategory::className() => 'Categories',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'var_name' => 'Var Name',
            'class' => 'Class',
            'params' => 'Params',
            'labels' => 'Labels',
            'is_list' => 'Is List',
            'index' => 'Index',
        ];
    }

    public function getType(){
        return $this->hasOne(WsTypes::className(), ['id' => 'type_id']);
    }

    public function getClassName(){
        $className = str_replace('/',';',$this->class);
        $className = str_replace("\\",';',$className);
        $className = explode(";",$className);
        if(is_array($className)){
            return $className[count($className)-1];
        }else{
            return $className;
        }
    }

    public function afterFind()
    {
        $this->labels = $this->getLabels();
        parent::afterFind();
    }

    public function getLabels(){
        if(is_array($this->labels)) {
            return $this->labels;
        } else {
            return json_decode($this->labels,true);
        }
    }

    public function setLabels($labels){
        $this->labels = json_encode($labels);
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->var_name = trim($this->var_name);
        $this->setLabels($this->labels);
        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->labels = $this->getLabels();
    }

    public function beforeDelete()
    {
        //todo при видаленні змінної треба видаляти всі поля з контенту
        return parent::beforeDelete();
    }
}
