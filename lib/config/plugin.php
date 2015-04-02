<?php

return array(
    'name' => 'Новинки',
    'description' => 'Список последних добавленных продуктов',
    'vendor' => 985310,
    'version' => '2.1.0',
    'img' => 'img/novelties.png',
    'shop_settings' => true,
    'frontend' => true,
    'handlers' => array(
        'frontend_nav' => 'frontendNav',
        'routing' => 'routing',
    ),
);
//EOF
