<?php

class shopNoveltiesPluginFrontendNoveltiesAction extends shopFrontendAction {

    protected $plugin_id = array('shop', 'novelties');

    public function execute() {
        $app_settings_model = new waAppSettingsModel();
        $status = $app_settings_model->get($this->plugin_id, 'status');

        if (!$status) {
            throw new waException(_ws("Page not found"), 404);
        }

        $settings = $app_settings_model->get($this->plugin_id);
        $collection = new shopNoveltiesProductsCollection();
        $collection->noveltiesFilter($settings);
        $this->setCollection($collection);


        wa()->getResponse()->setTitle($settings['page_title']);
        $this->getResponse()->setMeta('keywords', $settings['meta_keywords']);
        $this->getResponse()->setMeta('description', $settings['meta_description']);

        $this->view->assign('title', $settings['page_title']);
        $this->view->assign('frontend_search', wa()->event('frontend_search'));
        $this->setThemeTemplate('search.html');
    }

}
