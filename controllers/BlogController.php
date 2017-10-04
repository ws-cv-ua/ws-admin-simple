<?php

namespace wscvua\ws_admin_simple\controllers;

use wscvua\ws_admin_simple\models\blog\WsCategory;
use wscvua\ws_admin_simple\models\blog\WsContent;
use wscvua\ws_admin_simple\models\blog\WsLangs;
use wscvua\ws_admin_simple\models\blog\WsMenu;
use wscvua\ws_admin_simple\models\blog\WsString;
use wscvua\ws_admin_simple\models\blog\WsPages;
use wscvua\ws_admin_simple\models\blog\WsTypes;
use wscvua\ws_admin_simple\models\blog\WsTypesStructure;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use wscvua\ws_admin_simple\Module;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

class BlogController extends \yii\web\Controller
{
    public $layout = 'main';

    /* dashboard begin */
    public function actionIndex()
    {
        $blog = new ActiveDataProvider([
            'query' => WsPages::find()->where(['type_id'=>1])->orderBy(['id'=>'DESC'])
        ]);
        $services = new ActiveDataProvider([
            'query' => WsPages::find()->where(['type_id'=>9])->orderBy(['id'=>'ASC'])
        ]);
        $others = new ActiveDataProvider([
            'query' => WsPages::find()->where(['type_id'=>[10,11,12,13,14]])->orderBy(['id'=>'ASC'])
        ]);
        return $this->render('index',[
            'blog' => $blog,
            'services' => $services,
            'others' => $others,
        ]);
    }
    /* dashboard end */
    /* pages begin */
    public function actionPages()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => WsPages::find()
        ]);
        return $this->render('pages', ['pages' => $dataProvider]);
    }

    public function actionCreatePage($type_id=null)
    {
        $model = new WsPages();
        $model->author = \yii::$app->user->id;
        $model->type_id = $type_id;
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                $model->setCategories(\Yii::$app->request->post('WsPages')['categories']);
                return $this->redirect(['blog/edit-page', 'id' => $model->id]);
            }
        }
        return $this->render('create/page', ['model' => $model]);
    }

    public function actionEditPage($id)
    {
        $model = WsPages::findOne(['id' => $id]);
//        Module::pre(\Yii::$app->request->post());
        if ($model) {
            $action = \Yii::$app->request->post('action');
            switch ($action){
                case 'delete':
                    $deleteClass = \Yii::$app->request->post('delete_class');
                    $deleteId = \Yii::$app->request->post('delete_id');
                    if($deleteClass && $deleteId){
                        $delObj = new $deleteClass();
                        $delObj = $delObj->find()->where(['id'=>$deleteId])->one();
                        if($delObj){
                            $delObj->delete();
                        }
                    }
                    break;
                default:
                    if ($model->load(\Yii::$app->request->post()) && $model->save()) {
                        $model->setCategories(\Yii::$app->request->post('WsPages')['categories']);
                        foreach(\Yii::$app->request->post('WsContent') as $lang => $post){
                            $content = $model->getContent($lang);
                            $content->attributes = $post;
                            $content->upload();
                            $content->loadVars();
                            if($content->validate()){
                                $content->save();
                            }
                            else{
                                Module::pre($content->errors);
                            }
                        }
                    }
            }
            return $this->render('edit/page', ['model' => $model]);
        } else {
            return $this->redirect(['blog/pages']);
        }
    }

    public function actionDeletePage($id)
    {
        $model = WsPages::findOne(['id' => $id]);
        $model->delete();
        $this->redirect(['blog/pages']);
    }
    /* pages end */
    /* settings begin */
    public function actionSettings()
    {
        $langs = new ActiveDataProvider([
            'query' => WsLangs::find()
        ]);
        $types = new ActiveDataProvider([
            'query' => WsTypes::find()
        ]);
        return $this->render('settings', [
            'langs' => $langs,
            'types' => $types,
        ]);
    }

    /* langs begin */
    public function actionCreateLang()
    {
        $model = new WsLangs();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['blog/settings']);
            }
        }
        return $this->render('create/lang', ['model' => $model]);
    }

    public function actionEditLang($id)
    {
        $model = WsLangs::findOne(['id' => $id]);
        if ($model) {
            if ($model->load(\Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['blog/settings']);
            }
            return $this->render('edit/lang', ['model' => $model]);
        } else {
            return $this->redirect(['blog/settings']);
        }
    }

    public function actionDeleteLang($id)
    {
        $model = WsLangs::findOne(['id' => $id]);
        $model->delete();
        $this->redirect(['blog/settings']);
    }
    /* langs end */

    /* langs type */
    public function actionCreateType()
    {
        $model = new WsTypes();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['blog/edit-type','id'=>$model->id]);
            }
        }
        return $this->render('create/type', ['model' => $model]);
    }

    public function actionEditType($id)
    {
        $model = WsTypes::findOne(['id' => $id]);
        $structure = new ActiveDataProvider([
            'query' => WsTypesStructure::find()->where(['type_id' => $model->id])->orderBy('index')
        ]);
        if ($model) {
            if ($model->load(\Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['blog/settings']);
            }
            return $this->render('edit/type', [
                'model' => $model,
                'structure' => $structure,
                ]);
        } else {
            return $this->redirect(['blog/settings']);
        }
    }

    public function actionDeleteType($id)
    {
        $model = WsTypes::findOne(['id' => $id]);
        $model->delete();
        $this->redirect(['blog/settings']);
    }

    public function actionCreateTypeStructure($type_id)
    {
        $model = new WsTypesStructure();
        $model->type_id = $type_id;
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->validate() && $model->save()) {
                return $this->redirect(['blog/edit-type','id'=>$model->type_id]);
            }
        }
        return $this->render('create/type-structure', ['model' => $model]);
    }

    public function actionEditTypeStructure($id)
    {
        $model = WsTypesStructure::findOne(['id' => $id]);
        if ($model) {
            if ($model->load(\Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['blog/edit-type','id'=>$model->type_id]);
            }
            return $this->render('edit/type-structure', [
                'model' => $model,
            ]);
        } else {
            return $this->redirect(['blog/edit-type','id'=>$model->type_id]);
        }
    }

    public function actionDeleteTypeStructure($id)
    {
        $model = WsTypesStructure::findOne(['id' => $id]);
        $model->delete();
        return $this->redirect(['blog/edit-type','id'=>$model->type_id]);
    }
    /* langs type */

    /* settings end */


    public function actionMenu()
    {
        $model = new WsMenu();
        $action  = \yii::$app->request->post('action');
        $model_id = \yii::$app->request->post('model_id');
        $post = \yii::$app->request->post();
        if($model_id){
            $model = WsMenu::findOne($model_id);
        }
        switch ($action){
            case 'new':
                $parent_id = \yii::$app->request->post('parent_id');
                if($parent_id){
                    $model->parent_id = $parent_id;
                }
                break;
            case 'edit':
                break;
            case 'delete':
                $model->delete();
                break;
            case 'save':
                if($model->load(\yii::$app->request->post())){
                    if(!$model->save()){
//                        Module::pre($model->errors);
                    }else{
                        $model->saveItems($post);
                    }
                }
                break;
        }
        $tree = WsMenu::getTree();
        return $this->render('menu',[
            'model' => $model,
            'tree' => $tree,
        ]);
    }


    public function actionCategories()
    {
        $model = new WsCategory();
        $action  = \yii::$app->request->post('action');
        $model_id = \yii::$app->request->post('model_id');
        if($model_id){
            $model = WsCategory::findOne($model_id);
        }
        switch ($action){
            case 'new':
                $parent_id = \yii::$app->request->post('parent_id');
                if($parent_id){
                    $model->parent_id = $parent_id;
                }
                break;
            case 'edit':
                break;
            case 'delete':
                $model->delete();
                break;
            case 'save':
                if($model->load(\yii::$app->request->post())){
                    if(!$model->save()){
//                        Module::pre($model->errors);
                    }
                }
                break;
        }
        $tree = WsCategory::getTree();
        return $this->render('categories',[
            'model' => $model,
            'tree' => $tree,
        ]);
    }

    public function actionTypes()
    {
        return $this->render('types');
    }

    public function actionSort(){
        $indexes = \yii::$app->request->post('serial');
        if(!$indexes){
            return false;
        }
        $model_class = \yii::$app->request->post('model_class');
        if(!$model_class ){
            return false;
        }
        $model = new $model_class();
        $models = $model->find()->where(['id'=>array_values($indexes)])->all();
        if($models){
           foreach ($models as $model){
               $index = array_search($model->id, $indexes);
               if($index !== false){
                   $model->index = $index;
                   $model->save();
               }
           }
        }
    }

    public function actionSortTree(){
        $indexes = \yii::$app->request->post('serial');
//        Module::pre($indexes);
        if(!$indexes){
            return false;
        }
        $model_class = \yii::$app->request->post('model_class');
        if(!$model_class ){
            return false;
        }
        $model = new $model_class();
        $models = $model->find()->where(['id'=>array_keys($indexes)])->all();
        if($models){
            foreach ($models as $model){
//                Module::pre($model->id);
                if($indexes[$model->id]){
                    $index = $indexes[$model->id]['index'];
                    $parent = $indexes[$model->id]['parent'];
                    if($index !== false){
                        $model->parent_id = $parent;
                        $model->index     = $index;
                        $model->save();
                    }
                }
            }
        }
    }

    public function actionUploadimage(){
//        Module::pre($_FILES);
//        Module::pre(\Yii::$app->request->post());
        $id = \Yii::$app->request->post("id");
        $class = \Yii::$app->request->post("class");
        $modelClass = \Yii::$app->request->post("model_class");
        $modelId = \Yii::$app->request->post("model_id");
        $varName = \Yii::$app->request->post("var_name");
        if($modelClass && $modelId && $varName){
            $newModel = new $class ([
                'model_class' => $modelClass,
                'model_id'    => $modelId,
                'var_name'    => $varName,
            ]);
            if(isset($id) && $id !== 'null' && $id !== null){
                $findModel = $newModel->find()->where(['id' => $id])->one();
                if($findModel){
                    $newModel = $findModel;
                }
            }
            $shortModelClass = \yii\helpers\StringHelper::basename(get_class($newModel));
            $pathAlias = \Yii::getAlias("@frontend/web/uploads/images/".$modelId);
            BaseFileHelper::createDirectory($pathAlias);
            $file  = UploadedFile::getInstanceByName($shortModelClass.'['.$modelId.']['.$varName.'][file]');
//            var_dump($file);
            if($file){
                if(!$newModel->id){
                    $newModel->save();
                }
                $name  = $newModel->var_name.'['.$newModel->id.'].'.$file->extension;
                $newModel->src = '/uploads/images/'.$modelId.'/'.$name;
                $newModel->alt = $file->name.'.'.$file->extension;
                if($file->saveAs($pathAlias.DIRECTORY_SEPARATOR.$name)) {
                    $newModel->save();
                    return true;
                }
            }
        }
        return false;
    }

    public function actionDeleteimage(){
        $id = \Yii::$app->request->post("id");
        $class = \Yii::$app->request->post("class");
        if($class && $id){
            $model = new $class();
            $image = $model->find()->where(['id'=>$id])->one();
            if($image){
                $image->delete();
            }
        }
        return true;
    }

}