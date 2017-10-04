<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 30.07.2017
 * Time: 13:41
 */

namespace wscvua\ws_admin_simple;

use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'wscvua\ws_admin_simple\controllers';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['wscvua/ws_admin_simple/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@vendor/ws-cv-ua/ws-admin-simple/messages',
            'fileMap' => [
                'wscvua/ws_admin_simple/app' => 'app.php',
            ],
        ];
    }

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('wscvua/ws_admin_simple/' . $category, $message, $params, $language);
    }

    public static function pre($arr)
    {
        echo '<pre>'.print_r($arr,1),'</pre>';
    }

    public static function outCode($code){
        return '<pre><code class="php">'.trim(htmlspecialchars($code)).'</code></pre>';
    }

    public static function clearPhone($phone){
        $clear_phone = str_replace('(','', $phone);
        $clear_phone = str_replace(')','', $clear_phone );
        $clear_phone = str_replace(' ','', $clear_phone );
        $clear_phone = str_replace('-','', $clear_phone );
        return $clear_phone;
    }

}