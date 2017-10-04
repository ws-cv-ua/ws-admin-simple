<?php
use wscvua\ws_admin_simple\Module;
?>
<div class="x_panel">
    <div class="x_title">
        <h2><?= Module::t('app', 'Settings') ?></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
<? /* Set */ ?>
<h4><?= Module::t('app', 'Set one'); ?></h4>
<? /* Set one */
echo Module::outCode("
    <?= SettingSetWidget::widget([
        'key' => 'some variable key',
        'type' => SettingSetWidget::TYPE_ARTICLE,
    ]); ?>");
?>
<h4><?= Module::t('app', 'Set array'); ?></h4>
<? /* Set Array */
echo Module::outCode(" 
<?= SettingSetWidget::widget([
    'keys' => [
        'social_vk',
        'social_gp',
        'social_fb',
    ],
    'labels' => [
        'Vkontakte',
        'Google+',
        'Facebook',
    ],
]); ?>");
?>
<h4><?= Module::t('app', 'Output'); ?></h4>
<? /* Output */
echo Module::outCode("
<?= SettingOutWidget::widget([
    'key' => 'some variable key',
    'type' => SettingSetWidget::TYPE_BOOLEAN,
]); ?>");
?>
</div>
</div>