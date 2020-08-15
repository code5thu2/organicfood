<?php

return [
    [
        'id' => 'dashboard',
        'name' => 'Dashdoard',
        'icon' => 'fas fa-tachometer-alt',
        'route' => 'admin.index'
    ],
    [
        'id' => 'pro_manager',
        'name' => 'Quản lý sản phẩm',
        'icon' => 'fas fa-carrot',
        'route' => '',
        'items' => [
            [
                'name' => 'Danh sách sản phẩm',
                'icon' => 'fas fa-carrot',
                'route' => 'admin.products.index'
            ],
            [
                'name' => 'Danh mục',
                'icon' => 'fas fa-table',
                'route' => 'admin.categories.index'
            ],
            [
                'name' => 'Nhà cung cấp',
                'icon' => 'fas fa-handshake',
                'route' => 'admin.suppliers.index'
            ],
            [
                'name' => 'Tab thịnh hành',
                'icon' => 'fas fa-fire',
                'route' => 'admin.tags.index'
            ],
            [
                'name' => 'Đơn vị tính',
                'icon' => 'fas fa-weight-hanging',
                'route' => 'admin.units.index'
            ],
        ]
    ],
    [
        'id' => 'order_manager',
        'name' => 'Đơn hàng',
        'icon' => 'fas fa-cart-arrow-down',
        'route' => 'admin.orders.index',
        'items' => [
            [
                'name' => 'Danh sách đơn hàng',
                'icon' => 'fas fa-carrot',
                'route' => 'admin.orders.index'
            ],
            [
                'name' => 'Phương thức thanh toán',
                'icon' => 'far fa-money-bill-alt',
                'route' => ''
            ],
            [
                'name' => 'Phương thức giao hàng',
                'icon' => 'fas fa-truck',
                'route' => ''
            ],
        ],
    ],
    [
        'id' => 'customer_manager',
        'name' => 'Danh sách khách hàng',
        'icon' => 'fas fa-child',
        'route' => 'admin.customers.customer_list'
    ],
    [
        'id' => 'admin_manager',
        'name' => 'Tài khoản Admin',
        'icon' => 'fas fa-user-cog',
        'route' => 'admin.suppliers.index',
        'items' => [
            [
                'name' => 'Danh sách Admin',
                'icon' => 'fas fa-user-cog',
                'route' => 'admin.users.index'
            ],
            [
                'name' => 'Quyền Admin',
                'icon' => 'fas fa-shield-alt',
                'route' => 'admin.roles.index'
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
                'name' => 'User list',
                'icon' => '',
                'route' => 'admin.users.index'
            ],
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
