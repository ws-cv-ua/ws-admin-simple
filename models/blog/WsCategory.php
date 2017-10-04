<?php

namespace wscvua\ws_admin_simple\models\blog;
use wscvua\ws_admin_simple\Module;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ws_category".
 *
 * @property string $id
 * @property string $key
 * @property array $names
 * @property string $name
 * @property integer $parent_id
 * @property integer $index
 */
class WsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'unique'],
            [['parent_id','id','index'], 'integer'],
            [['key'], 'string', 'max' => 60],
            ['names', 'each', 'rule' => ['string']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'names' => 'Names',
            'parent_id' => 'Parent ID',
        ];
    }

    public function getPages(){
        $ids = ArrayHelper::getColumn($this->pagesLinks,'page_id');
        return WsPages::find()->where(['id' => $ids])->all();
    }

    public function getPagesLinks(){
        return $this->hasMany(WsPagesCategory::className(),['category_id'=>'id']);
    }

    public function afterFind()
    {
        $this->names = $this->getNames();
        parent::afterFind();
    }

    public function getNames(){
        if(is_array($this->names)) {
            return $this->names;
        } else {
            return json_decode($this->names,true);
        }
    }

    public function getName(){
        return $this->names[\yii::$app->language];
    }

    public function setNames($names){
        $this->names = json_encode($names);
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->setNames($this->names);
        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->names = $this->getNames();
    }

    public static function getTree(){
        $models = self::find()
            ->orderBy('parent_id,index')
            ->asArray()
            ->all();
        return self::buildTree($models);
    }

    public static function buildTree(array &$elements, $parentId = 0) {
        $branch = [];
        foreach ($elements as $element) {
            if ($element['parent_id'] == $parentId) {
                $children = self::buildTree($elements, $element['id']);
                if ($children) {
                    $element['children'] = $children;
                }
                $branch[$element['id']] = $element;
                unset($element);
            }
        }
        return $branch;
    }

    public function getParent(){
        return $this->hasOne(self::className(),['id'=>'parent_id']);
    }

    public function getChildren(){
        return $this->hasMany(self::className(),['parent_id'=>'id']);
    }

    public static function getList(){
        $langCode = WsLangs::currentCode();
        $rows = self::find()->all();
        $out = [];
        foreach ($rows as $row){
            $names = $row->names;
            $out[$row->id] = isset($row['names'][$langCode]) && $row['names'][$langCode] ? $row['names'][$langCode] : $row->key;
        }
        return $out;
    }

    public static function getTags(){
        $langCode = WsLangs::currentCode();
        $rows = self::find()->all();
        $out = [];
        foreach ($rows as $row){
            $names = $row->names;
            if($row->key){
                $out[$row->id] = [
                    'key' => $row->key,
                    'name' => isset($row['names'][$langCode]) && $row['names'][$langCode] ? $row['names'][$langCode] : $row->key
                ];
            }
        }
        return $out;
    }

}
