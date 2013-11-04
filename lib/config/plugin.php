<?php

return array(
    'name' => 'Новинки',
    'description' => 'Список последних добавленных продуктов',
    'vendor'=>903438,
    'version'=>'1.0.0',
    'img'=>'img/novelties.png',
    'shop_settings' => true,
    'frontend'    => true,
    'icons'=>array(
        16=>'img/novelties.png',
    ),
    'handlers' => array(
        'frontend_nav' => 'frontendNav',
    ),

);
//EOF
