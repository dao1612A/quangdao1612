<?php

return [

    'models' => [

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         * The model you want to use as a Permission model needs to implement the
         * `Spatie\Permission\Contracts\Permission` contract.
         */

        'permission' => Spatie\Permission\Models\Permission::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         *
         * The model you want to use as a Role model needs to implement the
         * `Spatie\Permission\Contracts\Role` contract.
         */

        'role' => Spatie\Permission\Models\Role::class,

    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'roles' => 'roles',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'permissions' => 'permissions',

        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_permissions' => 'model_has_permissions',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'model_has_roles' => 'model_has_roles',

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'role_has_permissions' => 'role_has_permissions',
    ],

    'column_names' => [

        /*
         * Change this if you want to name the related model primary key other than
         * `model_id`.
         *
         * For example, this would be nice if your primary keys are all UUIDs. In
         * that case, name this `model_uuid`.
         */

        'model_morph_key' => 'model_id',
    ],

    /*
     * When set to true, the required permission names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_permission_in_exception' => false,

    /*
     * When set to true, the required role names are added to the exception
     * message. This could be considered an information leak in some contexts, so
     * the default setting is false here for optimum safety.
     */

    'display_role_in_exception' => false,

    /*
     * By default wildcard permission lookups are disabled.
     */

    'enable_wildcard_permission' => false,

    'cache' => [

        /*
         * By default all permissions are cached for 24 hours to speed up performance.
         * When permissions or roles are updated the cache is flushed automatically.
         */

        'expiration_time' => \DateInterval::createFromDateString('24 hours'),

        /*
         * The cache key used to store all permissions.
         */

        'key' => 'spatie.permission.cache',

        /*
         * When checking for a permission against a model by passing a Permission
         * instance to the check, this key determines what attribute on the
         * Permissions model is used to cache against.
         *
         * Ideally, this should match your preferred way of checking permissions, eg:
         * `$user->can('view-posts')` would be 'name'.
         */

        'model_key' => 'name',

        /*
         * You may optionally indicate a specific cache driver to use for permission and
         * role caching using any of the `store` drivers listed in the cache.php config
         * file. Using 'default' here means to use the `default` set in cache.php.
         */

        'store' => 'default',
    ],

    'group' => [
        100 => "Full",
        1 => "T???ng quan",
        2 => "Tin t???c && S??? ki???n",
        4 => "Menu",
        5 => "B??i vi???t",
        3 => "Danh m???c",
        6 => "Th??nh vi??n",
        7 => "B??c s???",
        8 => "?????t l???ch",
        9 => "Slide",
        10 => "Group Admin",
        11 => "Permission",
        12 => "Role",
        13 => "Account",
    ],

    'data' => [
        [
            "name" => "full",
            "guard_name" => "admins",
            "description" => "full",
            "group_permission" => 100,
        ],
        [
            "name" => "dashboard",
            "guard_name" => "admins",
            "description" => "T???ng quan dashboard",
            "group_permission" => 1,
        ],
        [
            "name" => "group_article",
            "guard_name" => "admins",
            "description" => "Tin t???c s??? ki???n",
            "group_permission" => 2,
        ],
        [
            "name" => "menu_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch menu",
            "group_permission" => 4,
        ],
        [
            "name" => "menu_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i menu",
            "group_permission" => 4,
        ],
        [
            "name" => "menu_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t menu",
            "group_permission" => 4,
        ],
        [
            "name" => "menu_delete",
            "guard_name" => "admins",
            "description" => "Xo?? menu",
            "group_permission" => 4,
        ],
        [
            "name" => "article_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch b??i vi???t",
            "group_permission" => 5,
        ],
        [
            "name" => "article_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i article",
            "group_permission" => 5,
        ],
        [
            "name" => "article_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t article",
            "group_permission" => 5,
        ],
        [
            "name" => "article_delete",
            "guard_name" => "admins",
            "description" => "Xo?? menu",
            "group_permission" => 5,
        ],
        [
            "name" => "category_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch b??i vi???t",
            "group_permission" => 3,
        ],
        [
            "name" => "category_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i category",
            "group_permission" => 3,
        ],
        [
            "name" => "category_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t category",
            "group_permission" => 3,
        ],
        [
            "name" => "category_delete",
            "guard_name" => "admins",
            "description" => "Xo?? category",
            "group_permission" => 3,
        ],
        [
            "name" => "user_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch user",
            "group_permission" => 6,
        ],
        [
            "name" => "user_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i user",
            "group_permission" => 6,
        ],
        [
            "name" => "user_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t user",
            "group_permission" => 6,
        ],
        [
            "name" => "user_delete",
            "guard_name" => "admins",
            "description" => "Xo?? user",
            "group_permission" => 6,
        ],
        [
            "name" => "transaction_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch transaction",
            "group_permission" => 8,
        ],
        [
            "name" => "transaction_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t transaction",
            "group_permission" => 8,
        ],
        [
            "name" => "transaction_delete",
            "guard_name" => "admins",
            "description" => "Xo?? transaction",
            "group_permission" => 8,
        ],
        [
            "name" => "doctor_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch doctor",
            "group_permission" => 7,
        ],
        [
            "name" => "doctor_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i doctor",
            "group_permission" => 7,
        ],
        [
            "name" => "doctor_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t doctor",
            "group_permission" => 7,
        ],
        [
            "name" => "doctor_delete",
            "guard_name" => "admins",
            "description" => "Xo?? doctor",
            "group_permission" => 7,
        ],
        [
            "name" => "slide_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch slide",
            "group_permission" => 9,
        ],
        [
            "name" => "slide_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i slide",
            "group_permission" => 9,
        ],
        [
            "name" => "slide_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t slide",
            "group_permission" => 9,
        ],
        [
            "name" => "slide_delete",
            "guard_name" => "admins",
            "description" => "Xo?? slide",
            "group_permission" => 9,
        ],
        [
            "name" => "group_acl",
            "guard_name" => "admins",
            "description" => "Group group_acl",
            "group_permission" => 10,
        ],
        [
            "name" => "permission_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch permission_index",
            "group_permission" => 11,
        ],
        [
            "name" => "permission_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i permission",
            "group_permission" => 11,
        ],
        [
            "name" => "permission_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t permission",
            "group_permission" => 11,
        ],
        [
            "name" => "permission_delete",
            "guard_name" => "admins",
            "description" => "Xo?? permission",
            "group_permission" => 11,
        ],
        [
            "name" => "role_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch role",
            "group_permission" => 12,
        ],
        [
            "name" => "role_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i role",
            "group_permission" => 12,
        ],
        [
            "name" => "role_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t role",
            "group_permission" => 12,
        ],
        [
            "name" => "role_delete",
            "guard_name" => "admins",
            "description" => "Xo?? role",
            "group_permission" => 12,
        ],
        [
            "name" => "admin_index",
            "guard_name" => "admins",
            "description" => "Danh s??ch admin",
            "group_permission" => 13,
        ],
        [
            "name" => "admin_create",
            "guard_name" => "admins",
            "description" => "Th??m m???i admin",
            "group_permission" => 13,
        ],
        [
            "name" => "admin_edit",
            "guard_name" => "admins",
            "description" => "C???p nh???t admin",
            "group_permission" => 13,
        ],
        [
            "name" => "admin_delete",
            "guard_name" => "admins",
            "description" => "Xo?? admin",
            "group_permission" => 13,
        ],
    ]
];
