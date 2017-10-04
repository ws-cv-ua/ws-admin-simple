<?php

namespace wscvua\ws_admin_simple\models\blog;

use wscvua\ws_admin_simple\Module;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ws_langs".
 *
 * @property integer $id
 * @property string $code
 * @property string $local
 * @property string $name
 * @property integer $default
 */
class WsLangs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ws_langs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'local', 'name'], 'required'],
            [['default'], 'integer'],
            [['code'], 'string', 'max' => 4],
            [['local', 'name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'local' => 'Local',
            'name' => 'Name',
            'default' => 'Default',
        ];
    }

    public static function getList(){
        $rows = (new \yii\db\Query())
            ->select(['id', 'code'])
            ->from(self::tableName())
            ->all();
        return ArrayHelper::map($rows,'id','code');
    }

    public static function currentLang(){
        $lang = self::find()
            ->where([
                'code' => \yii::$app->language
            ])->orWhere([
                'local' => \yii::$app->language
            ])->one();
        if(!$lang){
            $langs = self::find()->all();
            foreach ($langs as $lang){
                if($lang->codeLocal == \yii::$app->language){
                    return $lang;
                }
            }
        }
        return $lang;
    }

    public static function currentCode(){
        $lang = self::currentLang();
        if($lang){
            return $lang->code;
        }
        return \yii::$app->language;
    }

    public static function dateFormat(){
        $format = 'yyyy-mm-dd';
        $lang = self::currentLang();
        if($lang){
            switch (strtolower($lang->local)){
                case 'uk':
                case 'ru':
                    $format = 'dd.mm.yyyy';
                    break;
                case 'en':
                    $format = 'mm/dd/yyyy';
                    break;
            }
        }
        return $format;
    }

    public static function dateTimeFormat(){
        return self::dateFormat().' hh:ii';
    }

    public static function dateCodeLocal(){
        $lang = self::currentLang();
        return $lang ?
            strtolower($lang->code).'-'.strtoupper($lang->local) :
            strtolower(\yii::$app->language).'-'.strtoupper(\yii::$app->language);
    }

    public function getCodeLocal(){
        return strtoupper($this->local);
    }
}
