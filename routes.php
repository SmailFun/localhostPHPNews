<?php
use Application\Controller\ViewNews;
use Application\Controller\AddNews;

const ROUTES =
[
    'news' => [
        'controller' => ViewNews::class,
        'method' => 'viewList',
        'child' => [
            'create' => [
                'controller' => AddNews::class,
                'method' => 'addList',
                'child' => []
                ],
            /*'confirm' => [
                'controller' => EditNews::class,
                'method' => 'editList',
                'child' => []
                ]*/
            ]
        ]
    ];