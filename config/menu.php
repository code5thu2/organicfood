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
                'icon' => '',
                'route' => 'categories.index'
            ],
            [
                'name' => 'Category add new',
                'icon' => '',
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
                'icon' => '',
                'route' => 'suppliers.index'
            ],
            [
                'name' => 'Supplier add new',
                'icon' => '',
                'route' => 'suppliers.create'
            ]
        ]
    ],
    [
        'id' => 'product',
        'name' => 'Product',
        'icon' => 'fas fa-carrot',
        'route' => 'products.index',
        'items' => [
            [
                'name' => 'Product list',
                'icon' => '',
                'route' => 'products.index'
            ],
            [
                'name' => 'Product add new',
                'icon' => '',
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
                'icon' => '',
                'route' => 'images.index'
            ],
            [
                'name' => 'Banner list',
                'icon' => '',
                'route' => 'banners.index'
            ],
        ]
    ],
    [
        'id' => 'usermanager',
        'name' => 'User manager',
        'icon' => 'fas fa-user-cog',
        'route' => '',
        'items' => [
            [
                'name' => 'Role manager',
                'icon' => '',
                'route' => 'roles.index'
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
                'icon' => 'fas fa-weight-hanging',
                'route' => 'units.index'
            ],
        ]
    ],
];
