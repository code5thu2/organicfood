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
<<<<<<< HEAD
        'id' => 'config',
        'name' => 'Config',
        'icon' => 'fas fa-weight',
        'route' => '',
=======
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
>>>>>>> c4d071b94c27a9a87c67d786aebc032889729680
        'items' => [
            [
                'name' => 'Unit management',
                'route' => 'units.index'
            ],
        ]
    ],
     [
        'id' => 'banner',
        'name' => 'Banner',
        'icon' => 'far fa-image',
        'route' => 'banners.index',
        'items' => [
            [
                'name' => 'Banner list',
                'route' => 'banners.index'
            ],
            [
                'name' => 'Banner add new',
                'route' => 'banners.create'
            ]
        ]
    ],
    [
<<<<<<< HEAD
        'id' => 'faq',
        'name' => 'Faq',
        'icon' => 'fas fa-question',
        'route' => '',
        'items' => [
            [
                'name' => 'Faq list',
                'route' => 'faqs.index'
=======
        'id' => 'filemanager',
        'name' => 'File manager',
        'icon' => 'fas fa-handshake',
        'route' => 'images.index',
        'items' => [
            [
                'name' => 'Image list',
                'route' => 'images.index'
>>>>>>> c4d071b94c27a9a87c67d786aebc032889729680
            ],
        ]
    ],
];
