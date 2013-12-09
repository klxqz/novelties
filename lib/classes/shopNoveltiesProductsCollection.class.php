<?php

class shopNoveltiesProductsCollection extends shopProductsCollection {

    public function noveltiesFilter($days, $rand = false) {
        if ($this->filtered) {
            return;
        }

        $date = date("Y-m-d", time() - 60 * 60 * 24 * $days);

        $this->where[] = "p.create_datetime > '" . $date . "'";
        if ($rand) {
            $this->order_by = "RAND()";
        }

        $this->prepared = true;
        $this->filtered = true;
    }

}
