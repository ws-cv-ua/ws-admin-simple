<?php
namespace wscvua\ws_admin_simple\models\blog;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ws_types".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $view_file
 * @property WsTypesStructure $structure
 */
class WsTypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64],
            [['description', 'view_file'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'view_file' => 'View File',
        ];
    }

    public static function getList(){
        $rows = (new \yii\db\Query())
            ->select(['id', 'name'])
            ->from(self::tableName())
            ->all();
        return ArrayHelper::map($rows,'id','name');
    }

    public function getStructure(){
        return $this->hasMany(WsTypesStructure::className(), ['type_id' => 'id'])->orderBy('index');
    }

    public function getStructures(){
        $out = [];
        foreach ($this->structure as $k => $v ){
            $out[$v->var_name] = $v;
        }
        return $out;
    }

    public static function findByKey($key){
        return self::find()->where(['name'=>$key])->one();
    }
}
