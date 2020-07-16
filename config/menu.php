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
        'route' => 'admin.categories.index',
        'items' => [
            [
                'name' => 'Category list',
                'icon' => '',
                'route' => 'admin.categories.index'
            ],
            [
                'name' => 'Category add new',
                'icon' => '',
                'route' => 'admin.categories.create'
            ]
        ]
    ],
    [
        'id' => 'supplier',
        'name' => 'Supplier',
        'icon' => 'fas fa-handshake',
        'route' => 'admin.suppliers.index',
        'items' => [
            [
                'name' => 'Supplier list',
                'icon' => '',
                'route' => 'admin.suppliers.index'
            ],
            [
                'name' => 'Supplier add new',
                'icon' => '',
                'route' => 'admin.suppliers.create'
            ]
        ]
    ],
    [
        'id' => 'product',
        'name' => 'Product',
        'icon' => 'fas fa-carrot',
        'route' => 'admin.products.index',
        'items' => [
            [
                'name' => 'Product list',
                'icon' => '',
                'route' => 'admin.products.index'
            ],
            [
                'name' => 'Product add new',
                'icon' => '',
                'route' => 'admin.products.create'
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
                'route' => 'admin.images.index'
            ],
            [
                'name' => 'Banner list',
                'icon' => '',
                'route' => 'admin.banners.index'
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
                'route' => 'admin.roles.index'
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
                'route' => 'admin.units.index'
            ],
        ]
    ],
];
