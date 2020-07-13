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
        'id' => 'product',
        'name' => 'Product',
        'icon' => 'far fa-lemon',
        'route' => 'products.index',
        'items' => [
            [
                'name' => 'Product list',
                'route' => 'products.index'
            ],
            [
                'name' => 'Product add new',
                'route' => 'products.create'
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
    [
        'id' => 'filemanager',
        'name' => 'File manager',
        'icon' => 'fas fa-handshake',
        'route' => 'images.index',
        'items' => [
            [
                'name' => 'Image list',
                'route' => 'images.index'
            ],
        ]
    ],
];
