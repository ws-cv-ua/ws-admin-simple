<?php

namespace wscvua\ws_admin_simple\widgets\blog;


use Yii;
use yii\helpers\ArrayHelper;
use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\models\blog\WsLangs;
use wscvua\ws_admin_simple\widgets\Menu;

class WsMenu extends \yii\base\Widget
{

    public $key = 'main_menu';
    public $linkTemplate = false;
    public $titleTemplate = false;
    public $level = 3;
    public $cssClass = 'side-menu';

    protected $menu = null;

    public function init()
    {
        $this->menu = \wscvua\ws_admin_simple\models\blog\WsMenu::findByKey($this->key);
    }

    public function run()
    {
        if(!$this->menu)
            return false;

        $items = $this->menu->getMenuItems();
        if($this->menu->show){
            $title = [
                'label' => $this->menu->name,
            ];
            if(isset($this->menu->page->content->link) && $this->menu->page->content->link){
                $title['url'] = ['/'.$this->menu->page->content->link];
            }
            if($this->titleTemplate){
                $title['template'] = $this->titleTemplate;
            }
            array_unshift($items,$title);
        }
        $options = [
            'items' => $items,
            'cssClass' => $this->cssClass
        ];
        if($this->linkTemplate){
            $options['linkTemplate'] = $this->linkTemplate;
        }
        $menu = Menu::widget($options);
        return $menu;
    }

}