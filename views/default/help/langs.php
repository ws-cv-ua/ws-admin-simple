<?php

use wscvua\ws_admin_simple\Module;

?>
<div class="x_panel">
    <div class="x_title">
        <h2><?= Module::t('app', 'Languages') ?></h2>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <h4><?= Module::t('app', 'List'); ?></h4>
        <pre><code class="php"><?=
                htmlspecialchars("<?= \wscvua\ws_admin_simple\widgets\LangLinks::widget([
    'wrap_class' => 'language_wrap',
    'current_lang_class' => 'language',
    'list_class' => 'list_lang'
]) ?>"); ?>
    </code></pre>
    </div>
</div>
