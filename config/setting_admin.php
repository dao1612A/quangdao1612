<?php
return [
    'sidebar' => [
        [
            'name'       => 'Tổng quan',
            'route'      => 'get_admin.dashboard',
            'class-icon' => 'la la-tachometer-alt'
        ],
        [
            'name'       => 'Tin tức && Sự kiện',
            'class-icon' => 'la la-edit',
            'sub'        => [
//                [
//                    'name'  => 'Từ khoá',
//                    'route' => 'get_admin.keyword.index'
//                ],
                [
                    'name'  => 'Menu',
                    'route' => 'get_admin.menu.index'
                ],
                [
                    'name'  => 'Bài viết',
                    'route' => 'get_admin.article.index'
                ],
            ]
        ],
        [
            'name'       => 'Danh mục',
            'route'      => 'get_admin.category.index',
            'class-icon' => 'la la-database'
        ],
        [
            'name'       => 'Thành viên',
            'route'      => 'get_admin.user.index',
            'class-icon' => 'la la-user'
        ],
        [
            'name'       => 'Đặt lịch',
            'route'      => 'get_admin.transaction.index',
            'class-icon' => 'la la-shopping-bag'
        ],
        [
            'name'       => 'Bác sỹ',
            'route'      => 'get_admin.doctor.index',
            'class-icon' => 'la la-user'
        ],
        [
            'name'       => 'Quản lý Slide',
            'route'      => 'get_admin.slide.index',
            'class-icon' => 'la la-database'
        ],
//        [
//            'name'       => 'Branch',
//            'route'      => 'get_admin.branch.index',
//            'class-icon' => 'la la-map-o'
//        ],
//        [
//            'name'       => 'Config Email',
//            'route'      => 'get_admin.email.index',
//            'class-icon' => 'la la-envelope'
//        ],
//        [
//            'name'       => 'Menu Navbar',
//            'route'      => 'get_admin.navbar.index',
//            'class-icon' => 'la la-bars'
//        ],
//        [
//            'name'       => 'Url Seo',
//            'route'      => 'get_admin.seo_product.index',
//            'class-icon' => 'la la-unlink'
//        ],
        [
            'name'       => 'Admin',
            'class-icon' => 'la la-cogs',
            'sub'        => [
                [
                    'name'  => 'Permission',
                    'route' => 'get_admin.permission.index'
                ],
                [
                    'name'  => 'Role',
                    'route' => 'get_admin.role.index'
                ],
                [
                    'name'  => 'Quản trị viên',
                    'route' => 'get_admin.account.index'
                ],
            ]
        ],
    ]
];
