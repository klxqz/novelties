<?php

class shopNoveltiesProductsCollection extends shopProductsCollection
{
    public function noveltiesFilter($days)
    {
        if ($this->filtered) {
            return;
        }
        
        $date = date("Y-m-d" ,time()-60*60*24*$days);
        
        $this->where[] = "p.create_datetime > '".$date."'";

        
        
        $this->filtered = true;
    }
    
}