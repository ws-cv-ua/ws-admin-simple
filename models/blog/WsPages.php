<?php

namespace wscvua\ws_admin_simple\models\blog;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\db\Query;
use yii\gii\Module;
use yii\helpers\ArrayHelper;
use yii\web\User;

/**
 * This is the model class for table "ws_pages".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type_id
 * @property integer $author
 * @property string $comment
 * @property integer $blocked
 * @property integer $created_at
 * @property integer $updated_at
 * @property WsTypes $type
 * @property WsContent $content
 */
class WsPages extends \yii\db\ActiveRecord
{
//    public $categories;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'author'], 'required'],
            [['type_id', 'author', 'blocked'], 'integer'],
            [['created_at','updated_at'], 'safe'],
            [['name', 'comment'], 'string', 'max' => 255],
//            ['categories','each', 'rule' => ['integer']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type_id' => 'Type ID',
            'author' => 'Author',
            'comment' => 'Comment',
            'blocked' => 'blocked',
            'created_at' => 'create time',
            'updated_at' => 'update time',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    self::EVENT_BEFORE_INSERT => ['created_at','updated_at'],
                    self::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => function () {
                    return new Expression('CURRENT_TIMESTAMP');
                }
            ],
        ];
    }

    public function getUser(){
        return $this->hasOne(\common\models\User::className(), ['id' => 'author']);
    }

    public function getType(){
        return $this->hasOne(WsTypes::className(), ['id' => 'type_id']);
    }

    public function getCategories(){
        $links = WsPagesCategory::find()->where(['page_id'=>$this->id])->all();
        $cat_ids = ArrayHelper::getColumn($links, 'category_id');
        return WsCategory::find()->where(['id'=>$cat_ids])->all();
    }

    public function getCategoriesLinks(){
        return $this->hasMany(WsPagesCategory::className(), ['page_id' => 'id']);
    }

    public function setCategories($newCetegories){
        foreach ($this->categoriesLinks as $pageCategory){
            $pageCategory->delete();
        }
        if($newCetegories ){
            foreach ($newCetegories as $category_id){
                $link = new WsPagesCategory([
                    'page_id' => $this->id,
                    'category_id' => (int)$category_id,
                ]);
                $link->save();
            }
        }
    }

    public function getCategoriesTags(){
        $out = [];
        foreach ($this->categories as $cat){
            $out[$cat->key] = $cat->names[\yii::$app->language];
        }
        return $out;
    }

    public function getContent($lang=false)
    {
        if (!$lang){
            $lang = WsLangs::currentLang()->id;
        }
        $content = WsContent::find()
            ->where([
                'page_id' => $this->id ,
                'lang_id' => $lang])
            ->one();
        if(!$content ){
            $content = new WsContent();
            $content->page_id = $this->id;
            $content->lang_id = $lang;
        }
        return $content;
    }

    public static function getList(){
        $lang = WsLangs::currentLang();
        $rows = WsContent::find()->where(['lang_id' => $lang->id])->all();
//        \wscvua\ws_admin_simple\Module::pre($rows);
        $out = [];
        foreach ($rows as $row){
            $out[$row->page_id] = $row->title.(isset($row->page->type->name) ? ' ('.$row->page->type->name.')' : '');
        }
        return $out;
    }

    public function getValues(){
        $out['type'] = $this->type->name;
        $out['view_file'] = $this->type->view_file;
        $out['values']['title'] = $this->content->title;
        $out['values']['url'] = $this->content->link;
        $out['values']['categories'] = $this->categoriesTags;
        $structures = $this->type->structures;
        if($this->content->values){
           foreach ($this->content->values as $var_name => $model){
//               \wscvua\ws_admin_simple\Module::pre($model->className());
               if($structures[$var_name]->is_list){
                   if($model){
                       foreach ($model as $k=>$v){
                           $out['values'][$var_name][] = $v->value;
                       }
                   }else{
                       $out['values'][$var_name][] = null;
                   }
               }else{
                   $out['values'][$var_name] = $model ? $model->value : null;
               }
           }
        }
        return $out;
    }

    public function beforeDelete()
    {
        foreach (WsLangs::getList() as $lang){
            $content = $this->getContent($lang);
            if(!$content->isNewRecord){
                $content->delete();
            }
        }
        return parent::beforeDelete();
    }
}
