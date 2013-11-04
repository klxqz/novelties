<?php
class shopNoveltiesPlugin extends shopPlugin
{

    public function frontendNav()
    {
        if($this->getSettings('default_output')) {
            return self::display();
        }
    }
    
    public static function display()
    {
        $plugin_id = array('shop', 'novelties');
        $tmp_path = 'plugins/novelties/templates/Novelties.html';
        
        $app_settings_model = new waAppSettingsModel();
        $status = $app_settings_model->get($plugin_id,'status');

        if(!$status) {
            return;
        }

        $count = $app_settings_model->get($plugin_id, 'count');
        
        $days = $app_settings_model->get($plugin_id, 'days');
        $collection = new shopNoveltiesProductsCollection();
        $collection->noveltiesFilter($days);
        $products = $collection->getProducts('*', 0, $count);

        $view = wa()->getView();

        $view->assign('novelties_products', $products);
        
        $template_path = wa()->getDataPath($tmp_path, false, 'shop', true);
        if(!file_exists($template_path)) {
            $template_path =wa()->getAppPath($tmp_path,  'shop');
        }
        
		$html = $view->fetch($template_path);
        return $html;
    }
}