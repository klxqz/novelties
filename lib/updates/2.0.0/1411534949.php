<?php

$plugin_id = array('shop', 'novelties');
$app_settings_model = new waAppSettingsModel();
$app_settings_model->set($plugin_id, 'no_img', '1');
$app_settings_model->set($plugin_id, 'page_url', 'novelties/');
$app_settings_model->set($plugin_id, 'meta_keywords', '');
$app_settings_model->set($plugin_id, 'meta_description', '');
$app_settings_model->set($plugin_id, 'img_size', '200');
$app_settings_model->set($plugin_id, 'use_slider', '1');


