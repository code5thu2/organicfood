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
    [
        'id' => 'supplier',
        'name' => 'Supplier',
        'icon' => 'fas fa-handshake',
        'route' => 'suppliers.index',
        'items' => [
            [
                'name' => 'Supplier list',
                'route' => 'suppliers.index'
            ],
            [
                'name' => 'Supplier add new',
                'route' => 'suppliers.create'
            ]
        ]
    ],
    [
        'id' => 'unit',
        'name' => 'Unit',
        'icon' => 'fas fa-handshake',
        'route' => 'units.index',
        'items' => [
            [
                'name' => 'Unit list',
                'route' => 'units.index'
            ],
            [
                'name' => 'Unit add new',
                'route' => 'units.create'
            ]
        ]
    ],
];
