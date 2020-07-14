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
        'id' => 'filemanager',
        'name' => 'File manager',
        'icon' => 'far fa-folder-open',
        'route' => '',
        'items' => [
            [
                'name' => 'Image',
                'route' => 'images.index'
            ],
            [
                'name' => 'Banner list',
                'route' => 'banners.index'
            ],
        ]
    ],
    [
        'id' => 'config',
        'name' => 'Config',
        'icon' => 'fas fa-cogs',
        'route' => '',
        'items' => [
            [
                'name' => 'Unit',
                'route' => 'units.index'
            ],
        ]
    ],
];
