<?
use wscvua\ws_admin_simple\Module;
echo wscvua\ws_admin_simple\widgets\Menu::widget(
    [
        "items" => [
            [
                "label" => Module::t('app', 'Dashboard'),
                "url" => ["/ws-admin-simple/default/index"],
                "icon" => "dashboard"
            ],[
                "label" => Module::t('app', 'Blog'),
                "icon" => "bold",
                "url" => '#',
                "items" => [
                    [
                        "label" => Module::t('app', 'Dashboard'),
                        "url"  => ["/ws-admin-simple/blog/index"],
                        'icon' => 'dashboard'
                    ],[
                        "label" => Module::t('app', 'Menu'),
                        "url"  => ["/ws-admin-simple/blog/menu"],
                        'icon' => 'bars'
                    ],[
                        "label" => Module::t('app', 'Categories'),
                        "url"  => ["/ws-admin-simple/blog/categories"],
                        'icon' => 'bookmark'
                    ],[
                        "label" => Module::t('app', 'Pages'),
                        "url"  => ["/ws-admin-simple/blog/pages"],
                        'icon' => 'file-text-o',
                        'active' => in_array(\Yii::$app->controller->action->id,  ['pages','edit-page']),

                    ],[
                        "label" => Module::t('app', 'Settings'),
                        "url"  => ["/ws-admin-simple/blog/settings"],
                        'icon' => 'cog',
                        'active' => in_array(\yii::$app->controller->action->id,['edit-type','settings'])
                    ],
                ],
            ],
            [
                "label" => Module::t('app', 'Settings'),
                "url" => ["/ws-admin-simple/default/settings"],
                "icon" => "cog"
            ],
            [
                "label" => Module::t('app', 'DevHelp'),
                "url" => ["/ws-admin-simple/default/dev-help"],
                "icon" => "code"
            ],
        ],
    ]
)
?>