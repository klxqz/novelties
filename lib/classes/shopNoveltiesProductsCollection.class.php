<?php

class shopNoveltiesProductsCollection extends shopProductsCollection {

    public function noveltiesFilter($options = array(), $rand = false) {
        $routing = wa()->getRouting();
        $route = $routing->getRoute();
        $days = isset($options['days']) ? $options['days'] : 30;
        $no_img = isset($options['no_img']) ? 1 : 0;

        if ($this->filtered) {
            return;
        }
        $date = date("Y-m-d", time() - 60 * 60 * 24 * $days);

        $this->where[] = "`p`.`create_datetime` > '" . $date . "'";
        $this->where[] = "`p`.`status` = 1"; //только опубликованные
        $this->where[] = "`p`.`category_id` IS NOT NULL"; //товары из корня не выводятся
        if (!empty($route['type_id'])) {
            $this->where[] = "`p`.`type_id` IN (" . implode(',', $route['type_id']) . ")";
        }

        if ($no_img) {
            $this->where[] = "`p`.`image_id` IS NOT NULL";
        }
        if ($rand) {
            $this->order_by = "RAND()";
        }

        $this->prepared = true;
        $this->filtered = true;
    }

}
