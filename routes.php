<?php

use Application\Controller\AddNews;

const ROUTES = [
    'news' =>[
        'controller' => ViewNews::class,
        'method' => 'viewList',
        'child' => [
            'add_news' => [
                'controller' => AddNews::class,
                'method' => 'addList',
                'child' => []
                ]
            ]
        ]

];