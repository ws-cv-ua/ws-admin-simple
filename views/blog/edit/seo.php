<?php
/* @var $page \wscvua\ws_admin_simple\models\blog\WsPages  */
/* @var $form \yii\widgets\ActiveForm */

$langs = \wscvua\ws_admin_simple\models\blog\WsLangs::getList();
?>
<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <? foreach($langs as $id => $code){ ?>
            <li role="presentation" <?= $code == 'uk' ? 'class="active"' : '' ?> >
                <a href="#seo-<?=$code?>"
                   id="seo-<?=$code?>-tab"
                   role="tab"
                   data-toggle="tab"
                   aria-expanded="true"><?=strtoupper($code)?></a>
            </li>
        <? } ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <? foreach($langs as $id => $code){
            $content = $page->getContent($id);?>
            <div role="tabpanel"
                 class="tab-pane fade <?= $code == 'uk' ? "active" : '' ?> in"
                 id="seo-<?=$code?>"
                 aria-labelledby="seo-<?=$code?>-tab">
                <div class="x_panel">
                    <?= $this->render('/blog/others/x_title',[
                        'title'=>\wscvua\ws_admin_simple\Module::t('app','Seo')
                    ]);?>
                    <div class="x_content">
                        <?= $this->render('../forms/seo',[
                            'model' => $content,
                            'form' => $form,
                        ]) ?>
                    </div>
                </div>
                <? if($content->id){ ?>
                <div class="x_panel">
                    <?= $this->render('/blog/others/x_title',[
                        'title'=>\wscvua\ws_admin_simple\Module::t('app','Content')
                    ]);?>
                    <div class="x_content">
                        <?= $this->render('../forms/content',[
                            'form'    => $form,
                            'page'    => $page,
                            'content' => $content,
                        ]) ?>
                    </div>
                </div>
                <? } ?>
            </div>
        <? } ?>
    </div>
</div>