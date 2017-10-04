<?php

use wscvua\ws_admin_simple\Module;

?>
<div class="x_panel">
    <div class="x_title">
        <h2><?= Module::t('app', 'Menu') ?></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">

<h4><?= Module::t('app', 'Simple'); ?></h4>
        <pre><code class="php"><?=
                htmlspecialchars("<?= wscvua\ws_admin_simple\widgets\blog\WsMenu::widget([
    'key' => 'main_menu',
]) ?>"); ?>
    </code></pre>

<h4><?= Module::t('app', 'Template'); ?> 1</h4>
        <pre><code class="php"><?=
                htmlspecialchars("<?= wscvua\ws_admin_simple\widgets\blog\WsMenu::widget([
    'key' => 'main_menu',
    'linkTemplate' => '<a href=\"{url}\"><span class=\"link_text\">{label}</span>
        <span class=\"line -right\"></span>
        <span class=\"line -top\"></span>
        <span class=\"line -left\"></span>
        <span class=\"line -bottom\"></span>{badge}</a>'
]) ?>"); ?>
    </code></pre>

<h4><?= Module::t('app', 'Template'); ?> 2</h4>
        <pre><code class="php"><?=
                htmlspecialchars("<?= wscvua\ws_admin_simple\widgets\blog\WsMenu::widget([
    'key' => 'footer_1',
    'cssClass' => 'section_services',
    'titleTemplate' => '<li class=\"head\">{label}</li>',
    'linkTemplate' => '<a href=\"{url}\" title=\"{label}\">{label}</a>'
]) ?>"); ?>
    </code></pre>


    </div>
</div>
