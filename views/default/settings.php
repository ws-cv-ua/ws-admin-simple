<?php
/**
 * @var $this \yii\web\View
 */

use wscvua\ws_admin_simple\Module;
use wscvua\ws_admin_simple\widgets\setting_setting\SettingSetWidget;

$this->title = Module::t('app', 'Settings');
$phone_keys = $labels = $address_keys = $contacts_phones_keys = $contacts_address_keys = $call_keys = $copyright_keys = [];
foreach (\wscvua\ws_admin_simple\models\blog\WsLangs::getList() as $lang){
    $phone_keys[] = 'phone_'.$lang;
    $call_keys[] = 'order_call_'.$lang;
    $address_keys[] = 'address_'.$lang;
    $copyright_keys[] = 'copyright_'.$lang;
    $contacts_phones_keys[] = 'contacts_phones_'.$lang;
    $contacts_address_keys[] = 'contacts_address_'.$lang;
    $labels[] = strtoupper($lang);
}
?>

<div class="page-title">
    <div class="title_left">
        <h3><?= $this->title ?></h3>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-xs-12">

        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <?= Module::t('app', 'Fields'); ?>
                    <small><?= Module::t('app', 'For header and footer'); ?></small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab_contact_phone" role="tab" data-toggle="tab" aria-expanded="true">
                                <?= Module::t('app', 'Phones'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_contact_address" role="tab" data-toggle="tab" aria-expanded="false">
                                <?= Module::t('app', 'Address'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_soc_links" role="tab" data-toggle="tab" aria-expanded="false">
                                <?= Module::t('app', 'Social networks'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_order_call" role="tab" data-toggle="tab" aria-expanded="false">
                                <?= Module::t('app', 'Order a call'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_copyright" role="tab" data-toggle="tab" aria-expanded="false">©</a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_contact_phone"
                             aria-labelledby="home-tab">
                            <?
                            echo  SettingSetWidget::widget([
                                'keys' => $phone_keys,
                                'labels' => $labels,
                            ]);
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_contact_address" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => $address_keys,
                                'labels' => $labels,
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_soc_links" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => [
                                    'social_instagram',
                                    'social_gp',
                                    'social_fb',
                                ],
                                'labels' => [
                                    'Instagram',
                                    'Google+',
                                    'Facebook',
                                ],
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_order_call" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => $call_keys,
                                'labels' => $labels,
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_copyright" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => $copyright_keys,
                                'labels' => $labels,
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <?= Module::t('app', 'Contacts'); ?>
                    <small><?= Module::t('app', 'For contact map'); ?></small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                <?= Module::t('app', 'Phones'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                <?= Module::t('app', 'E-mail\'s'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"
                               aria-expanded="false">
                                <?= Module::t('app', 'Addresses'); ?>
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#tab_content4" role="tab" data-toggle="tab" aria-expanded="false">
                                <?= Module::t('app', 'Latitude & Longitude'); ?>
                            </a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                             aria-labelledby="home-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => $contacts_phones_keys,
                                'labels' => $labels,
                                'type' => SettingSetWidget::TYPE_ARTICLE,
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'key' => 'contacts-emails',
                                'type' => SettingSetWidget::TYPE_ARTICLE,
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'keys' => $contacts_address_keys,
                                'labels' => $labels,
                                'type' => SettingSetWidget::TYPE_ARTICLE,
                            ]); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                            <?= SettingSetWidget::widget([
                                'key' => 'latLng'
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-xs-12">

        <div class="x_panel">
            <div class="x_title">
                <h2><?= Module::t('app', 'Notifications Email\'s'); ?>
                    <small><?= Module::t('app', 'Through a coma'); ?></small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?= SettingSetWidget::widget([
                    'key' => 'notify-email',
                    'type' => SettingSetWidget::TYPE_TEXT,
                ]); ?>
            </div>
        </div>

        <div class="x_panel">
            <div class="x_title">
                <h2><?= Module::t('app', 'JS-code'); ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#js_tab_start"
                               id="js-tab-tab"
                               role="tab"
                               data-toggle="tab"
                               aria-expanded="true">
                                Start body
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#js_tab_end"
                               id="js-end-tab"
                               role="tab"
                               data-toggle="tab"
                               aria-expanded="false">
                                End body
                            </a>
                        </li>
                        <li role="presentation" class="">
                            <a href="#js_tab_google_analitis"
                               id="js-end-google_analitis"
                               role="tab"
                               data-toggle="tab"
                               aria-expanded="false">
                                Google Analytics
                            </a>
                        </li>

                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel"
                             class="tab-pane fade active in"
                             id="js_tab_start"
                             aria-labelledby="js-tab">
                            <?= SettingSetWidget::widget([
                                'key' => 'js_body_start',
                                'type' => SettingSetWidget::TYPE_TEXT,
                            ]); ?>
                        </div>
                        <div role="tabpanel"
                             class="tab-pane fade in"
                             id="js_tab_end"
                             aria-labelledby="js-tab">
                            <?= SettingSetWidget::widget([
                                'key' => 'js_body_end',
                                'type' => SettingSetWidget::TYPE_TEXT,
                            ]); ?>
                        </div>
                        <div role="tabpanel"
                             class="tab-pane fade in"
                             id="js_tab_google_analitis"
                             aria-labelledby="js-tab">
                            <div class="x_content">
                                <?= SettingSetWidget::widget([
                                    'key' => 'google_analytics',
                                    'type' => SettingSetWidget::TYPE_TEXT,
                                ]); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
