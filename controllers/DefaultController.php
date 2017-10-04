<?php

namespace wscvua\ws_admin_simple\controllers;

class DefaultController extends \yii\web\Controller
{
    public $layout = 'main';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSettings()
    {
        return $this->render('settings');
    }

    public function actionDevHelp()
    {
        return $this->render('help');
    }

}