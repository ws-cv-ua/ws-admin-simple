<?php

namespace wscvua\ws_admin_simple\models\blog;
use Yii;

/**
 * This is the model class for table "ws_menu_items".
 *
 * @property integer $id
 * @property integer $menu_id
 * @property integer $lang_id
 * @property string $name
 * @property string $link
 * @property integer $show
 * @property WsLangs $lang
 * @property WsMenu $menu
 */
class WsMenuItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_menu_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['menu_id', 'page_id', 'lang_id', 'name'], 'required'],
            [['menu_id', 'lang_id',], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['link'], 'string', 'max' => 64],
            ['show', 'boolean']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'menu_id' => 'Menu ID',
            'page_id' => 'Page ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
            'show' => 'Show',
        ];
    }

    public function getLang(){
        return $this->hasOne(WsLangs::className(),['id'=>'lang_id']);
    }

    public function getMenu(){
        return $this->hasOne(WsMenu::className(),['id'=>'menu_id']);
    }

}
