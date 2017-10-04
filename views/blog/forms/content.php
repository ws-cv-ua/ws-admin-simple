<?php
/* @var $form \yii\widgets\ActiveForm */
/* @var $page \wscvua\ws_admin_simple\models\blog\WsPages  */
/* @var $content \wscvua\ws_admin_simple\models\blog\WsContent  */
use \wscvua\ws_admin_simple\Module;
$langCode = \wscvua\ws_admin_simple\models\blog\WsLangs::currentCode();
foreach ($content->formsModels as $var_name=>$models){
//    Module::pre($var_name);
//    Module::pre($models);
    if(isset($models['new'])){
        $shortClassName = \yii\helpers\StringHelper::basename(get_class($models['new']));
        try
        {
            echo $this->render('/blog/types/list/'.$shortClassName,[
                'model' => $models['new'],
                'labels' => $models['labels'],
                'list' => $models['list'],
                'form' => $form,
                'langCode' => $langCode,
            ]);
        }
        catch(\yii\base\ViewNotFoundException $e){ ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            <?= Module::t('app', 'View file dont exist').': "/blog/types/list/'.$shortClassName ?>
            </div>
        <? }
    }
    if(isset($models['one'])){
        $shortClassName = \yii\helpers\StringHelper::basename(get_class($models['one']));
        try
        {
            echo $this->render('/blog/types/one/'.$shortClassName,[
                'form' => $form,
                'model' => $models['one'],
                'labels' => $models['labels'],
                'langCode' => $langCode,
            ]);
        }
        catch(\yii\base\ViewNotFoundException $e){ ?>
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?= Module::t('app', 'View file dont exist').': "/blog/types/one/'.$shortClassName ?>
            </div>
            <?
        }
    }
}
?>
