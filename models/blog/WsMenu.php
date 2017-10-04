<?php

namespace wscvua\ws_admin_simple\models\blog;

use wscvua\ws_admin_simple\Module;
use Yii;

/**
 * This is the model class for table "ws_menu".
 *
 * @property integer $id
 * @property integer $index
 * @property integer $page_id
 * @property string $key
 * @property integer $parent_id
 * @property WsMenuItems $items
 * @property WsMenu $children
 * @property WsMenu $parent
 * @property WsPages $page
 * @property array $names
 * @property array $shows
 * @property string $name
 * @property string $show
 * @property array $linksParams
 * @property string $linkParams
 */
class WsMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['key'], 'required'],
            [['key'], 'unique'],
            [['parent_id','index','page_id'], 'integer'],
//            [['names','links'], 'each', 'rule' => ['string']],
        ];
    }

    public function beforeSave($insert) {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $index = self::find()->where([
            'parent_id' => $this->parent_id ? (int)$this->parent_id : null
        ])->orderBy("index DESC")
        ->one();
        if($this->isNewRecord){
            $this->index = $index->index + 1;
        }
        return true;
    }

    public function getNames(){
        $out = [];
//        var_dump($this->items);
        foreach ($this->items as $lang => $item){
            $out[$lang] = $item->name;
        }
        return $out;
    }

    public function getName(){
        return $this->names[\yii::$app->language];
    }

    public function getLinksParams(){
        $out = [];
//        var_dump($this->items);
        foreach ($this->items as $lang => $item){
            $out[$lang] = $item->link;
        }
        return $out;
    }

    public function getLinkParams(){
        return $this->linksParams[\yii::$app->language];
    }

    public function getShows(){
        $out = [];
        foreach ($this->items as $lang => $item){
            $out[$lang] = $item->show;
        }
        return $out;
    }

    public function getShow(){
        return $this->shows[\yii::$app->language];
    }

    public static function getTree(){
        $models = self::find()
            ->orderBy('parent_id,index')
//            ->asArray()
            ->all();
        $out = [];
        foreach ($models as $model){
            $attributes = $model->attributes;
            foreach ($model->items as $lang => $item){
                $attributes['names'][$lang] = $item->name;
            }
            $out[] = $attributes;
        }
        return self::buildTree($out);
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

    public static function findByKey($key){
        $model = self::find()->where(['key'=>$key])->one();
        return $model ? $model : false;
    }

    public function getParent(){
        return $this->hasOne(self::className(),['id'=>'parent_id']);
    }

    public function getChildren(){
        return $this->hasMany(self::className(),['parent_id'=>'id']);
    }

    public function getpage(){
        return $this->hasOne(WsPages::className(),['id'=>'page_id']);
    }

    public function getItems(){
        $items = WsMenuItems::find()->where(['menu_id'=>$this->id])->all();
        $langs = WsLangs::getList();
        $out=[];
        foreach ($items as $item){
            if($item->lang_id && isset($langs[$item->lang_id])){
                $out[$langs[$item->lang_id]] = $item;
            }
        }
        foreach ($langs as $lang_id=>$lang){
            if(!isset($out[$lang])){
                $item = new WsMenuItems();
                $item->lang_id = $lang_id;
                $item->menu_id = $this->id;
                $out[$lang] = $item;
            }
        }
        return $out;
    }

    public function getMenuItems($level = 0, $maxLevel = 3){
        $out = [];
        if($this->children){
           foreach ($this->children as $key => $item){
               $link = $item->page->content->link.($item->linkParams ? $item->linkParams : '');
               $out[$key]['label'] = $item->items[\yii::$app->language]->name;
               $out[$key]['url'] = ['/'.$link];
               if($level < $maxLevel){
                    $items = $item->getMenuItems($level+1,$maxLevel);
                    if($items){
                        $out[$key]['items'] = $items;
                    }
               }
           }
        }
        return $out;
    }

    public static function getList(){
        $langCode = WsLangs::currentCode();
        $rows = self::find()->all();
        $out = [];
        foreach ($rows as $row){
            $row->names;
            $name = $row->names[\yii::$app->language];
            $out[$row->id] = $name;
        }
        return $out;
    }

    public function saveItems($post){
        if(isset($post['WsMenuItems'])){
            $items = $this->items;
            foreach ($items as $lang=>$item){
                if(isset($post['WsMenuItems'][$lang])){
                    $item->attributes = $post['WsMenuItems'][$lang];
                    $item->menu_id = $this->id;
                    $item->save();
                }
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'index' => 'Index',
            'page_id' => 'Page',
            'parent_id' => 'Parent ID',
        ];
    }
}
