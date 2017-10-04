<?php

namespace wscvua\ws_admin_simple\controllers;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class BackendController extends Controller
{
    public $layout = '@vendor/ws-cv-ua/ws-admin-simple/views/layouts/main';

    public function actionIndex()
    {
        return $this->redirect(['/ws-admin-simple']);
    }
}
