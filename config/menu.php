<?php

return [
    [
        'id' => 'dashboard',
        'name' => 'Dashdoard',
        'icon' => 'fas fa-tachometer-alt',
        'route' => 'admin.index'
    ],
    [
        'id' => 'category',
        'name' => 'Category',
        'icon' => 'fas fa-table',
        'route' => 'categories.index',
        'items' => [
            [
                'name' => 'Category list',
                'route' => 'categories.index'
            ],
            [
                'name' => 'Category add new',
                'route' => 'categories.create'
            ]
        ]
    ],
];
