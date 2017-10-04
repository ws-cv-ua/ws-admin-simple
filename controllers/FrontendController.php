<?php
namespace wscvua\ws_admin_simple\controllers;

use wscvua\ws_admin_simple\models\blog\WsCategory;
use wscvua\ws_admin_simple\models\blog\WsContent;
use wscvua\ws_admin_simple\models\blog\WsLangs;
use wscvua\ws_admin_simple\models\blog\WsPages;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class FrontendController extends Controller
{
    public $bodyClass;

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    public function actionTodo($todo='/'){
        $action = 'action'.$todo;
        $action = str_replace('-','',$action);
        if(self::hasMethod($action)){
            return self::$action();
        }
        $lang_id = \wscvua\ws_admin_simple\models\blog\WsLangs::currentLang()->id;
        $model = \wscvua\ws_admin_simple\models\blog\WsContent::find()
            ->where([
                'link'=>$todo,
                'lang_id'=>$lang_id
            ])->one();
        if($model && isset($model->page->type) && $model->page->type->id != 1 && $model->published){
            $model->registerMetaTag();
            $values = $model->page->values;
            $this->bodyClass = $values['view_file'].'-page';
            try
            {
                return $this->render($values['view_file'],[
                    'values'=>$values['values']
                ]);
            }
            catch(\yii\base\ViewNotFoundException $e){ ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <?= \yii::t('app', 'View file dont exist').': "/frontend/site/'.$values['view_file']?>
                </div>
            <? }
        }else{
            throw new NotFoundHttpException(
                \yii::t('app','Page not found')
            );
        }
    }

    public function actionBlog($page = false)
    {
        $this->bodyClass = 'blog-page';
        $get = \yii::$app->request->get();
        if($page){
            $post = WsContent::find()->where([
                'lang_id'   => WsLangs::currentLang()->id,
                'link'      => trim($page),
                'published' => true
            ])->one();
            if($post && $post->page->type->id == 1){ //is news
                try
                {
                    return $this->render($post->page->values['view_file'],[
                        'values'=>$post->page->values['values']
                    ]);
                }
                catch(\yii\base\ViewNotFoundException $e){ ?>
                    <div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <?= \yii::t('app', 'View file dont exist').': "/frontend/site/'.$values['view_file']?>
                    </div>
                <? }
            }else{
                throw new NotFoundHttpException(
                    \yii::t('app','Page not found')
                );
            }
        }
        $news = [];
        if(isset($get['category'])){
            $category = WsCategory::find()->where([
                'key' => $get['category']
            ])->one();
            if($category){
                if($category->pages){
                    foreach ($category->pages as $post){
                        $news[] = $post->values['values'];
                    }
                }
            }
        }else{
            $pages = WsPages::find()->where(['type_id' => 1])->all();
            if($pages){
                foreach ($pages as $page){
                    $news[] = $page->values['values'];
                }
            }
        }
        ArrayHelper::multisort($news,['date_published'],[SORT_DESC]);
        return $this->render('blog', [
            'news' => $news,
            'category' => isset($category) ? $category->name : false
        ]);
    }
}
