<?php

namespace wscvua\ws_admin_simple\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\models\blog\WsLangs;

class LangLinks extends \yii\base\Widget
{
    public $wrap_class = 'language_wrap';
    public $current_lang_class = 'language';
    public $list_class = 'list_lang';

    private $curentLang;
    private $langs;

    public function init()
    {
        $this->langs = \wscvua\ws_admin_simple\models\blog\WsLangs::find()->all();
        $this->curentLang = WsLangs::currentLang();
    }

    public function run()
    {
        ?>
        <div <?=$this->wrap_class ? 'class="'.$this->wrap_class.'"' : ''?>>
            <a <?=$this->current_lang_class ? 'class="'.$this->current_lang_class.'"' : ''?>>
                <?= $this->curentLang->code ?>
            </a>
            <? if($this->list_class !== false) { ?>
                <div <?=$this->list_class ? 'class="'.$this->list_class.'"' : '' ?>>
            <? }
                foreach ($this->langs as $lang): ?>
                    <?php if (Yii::$app->language != $lang->code): ?>
                        <?= Html::a( $lang->code == 'uk' ? $lang->local : $lang->code,
                            [Yii::$app->controller->action->uniqueId, 'language' => $lang->code]
                        ); ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            <? if($this->list_class !== false) { ?>
                </div>
            <? } ?>
        </div>
        <?
    }

}