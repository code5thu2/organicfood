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
        'id' => 'config',
        'name' => 'Config',
        'icon' => 'fas fa-weight',
        'route' => '',
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
        'id' => 'faq',
        'name' => 'Faq',
        'icon' => 'fas fa-question',
        'route' => '',
        'items' => [
            [
                'name' => 'Faq list',
                'route' => 'faqs.index'
            ],
        ]
    ],
];
