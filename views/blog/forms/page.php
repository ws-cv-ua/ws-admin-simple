<?
/* @var $this yii\web\View */
/* @var $model wscvua\ws_admin_simple\models\blog\WsPages */
/* @var $form ActiveForm */
//\wscvua\ws_admin_simple\Module::pre($model->getCategories());
//\wscvua\ws_admin_simple\Module::pre($model->categoriesLinks);
?>
<div class="col-md-6 col-sm-6 col-xs-12">
    <?= $form->field($model, 'name', [
            'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
            'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->textInput(['maxlength' => 64])
        ->label(\wscvua\ws_admin_simple\Module::t('app', 'Name'))
    ?>
    <?= $form->field($model, 'type_id', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
        ])->dropDownList(\wscvua\ws_admin_simple\models\blog\WsTypes::getList())->label(\wscvua\ws_admin_simple\Module::t('app', 'Type')) ?>
</div>
<div class="col-md-6 col-sm-6 col-xs-12">
    <?= $form->field($model, 'categories', [
        'template' => "{label}\n<div class='col-md-3 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
    ])->dropDownList(\wscvua\ws_admin_simple\models\blog\WsCategory::getList(),[
        'multiple' => 'multiple'
    ])->label(\wscvua\ws_admin_simple\Module::t('app', 'Categories'))
    ?>
    <?= $form->field($model, 'comment', [
        'template' => "{label}\n<div class='col-md-9 col-sm-9 col-xs-12'>{input}\n{hint}\n{error}</div>",
        'labelOptions' => ['class' => 'control-label col-md-3 col-sm-3 col-xs-12'],
    ])->textInput(['maxlength' => 64])
    ->label(\wscvua\ws_admin_simple\Module::t('app', 'Comment'))
    ?>
</div>
