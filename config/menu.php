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
                'route' => 'admin.payments.index'
            ],
            [
                'name' => 'Phương thức giao hàng',
                'icon' => 'fas fa-truck',
                'route' => 'admin.shippings.index'
            ],
        ],
    ],
    [
        'id' => 'customer_manager',
        'name' => 'Khách hàng',
        'icon' => 'fas fa-child',
        'route' => 'admin.customers.customer_list',
        'items' => [
            [
                'name' => 'Danh sách khách hàng',
                'icon' => 'fas fa-user',
                'route' => 'admin.customers.customer_list'
            ],
            [
                'name' => 'Email đăng ký',
                'icon' => 'far fa-envelope',
                'route' => 'admin.subscribe_list'
            ],
            [
                'name' => 'Feedback',
                'icon' => 'fas fa-reply-all',
                'route' => 'admin.feedback_list'
            ],
        ],
    ],
    [
        'id' => 'media_sell',
        'name' => 'Truyền thông',
        'icon' => 'fas fa-ad',
        'route' => 'admin.images.index',
        'items' => [
            [
                'name' => 'File',
                'icon' => 'far fa-folder-open',
                'route' => 'admin.images.index'
            ],
            [
                'name' => 'Danh sách banner',
                'icon' => '',
                'route' => 'admin.banners.index'
            ],
        ]
    ],
    [
        'id' => 'blog_manager',
        'name' => 'Bài viết & bình luận',
        'icon' => 'fab fa-blogger',
        'route' => 'admin.blogs.index',
        'items' => [
            [
                'name' => 'Bài viết',
                'icon' => 'fas fa-blog',
                'route' => 'admin.blogs.index'
            ],
            [
                'name' => 'Danh sách bình luận',
                'icon' => 'far fa-comment-dots',
                'route' => 'admin.comment_list'
            ],
            [
                'name' => 'FAQ',
                'icon' => 'fas fa-question',
                'route' => 'admin.faqs.index'
            ],
        ]
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
        'id' => 'config',
        'name' => 'Config',
        'icon' => 'fas fa-cogs',
        'route' => '',
        'items' => [
            [
                'name' => 'Liên hệ',
                'icon' => 'far fa-address-book',
                'route' => 'admin.contacts.index'
            ],
        ]
    ],
];
