<?php
namespace wscvua\ws_admin_simple\models\blog;

use Yii;

/**
 * This is the model class for table "ws_pages_category".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $page_id
 */
class WsPagesCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_pages_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'page_id'], 'required'],
            [['category_id', 'page_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'page_id' => 'Page ID',
        ];
    }
}
