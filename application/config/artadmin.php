<?php

return [
    "name"=>'ADminka',
    "tables"=>[
        "users"=>'admin_users',
        "roles"=>'admin_roles',
        'permissions'=>'admin_permissions',
        'users_permissions'=>'admin_users_permissions',
        'users_roles'=>'admin_users_roles',
        'roles_permissions'=>'admin_roles_permissions',


    ],
    'route_after_login'=>"artadmin.index",
    "url_prefix"=>'admin',
    'guard'=>'admin',
    'top_menu_right'=>[
        ["icon"=>"icon-edit","route_name"=>"artadmin.password","title"=>"current_user"],
        ["icon"=>"icon-edit","route_name"=>"artadmin.clear_cache","title"=>'Очистить кеш'],
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.admins.list","title"=>"Все администраторы"],
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.roles.list","title"=>"Роли"],
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.permissions.list","title"=>"Права доступа"],
        ["icon"=>"icon-logout","route_name"=>'artadmin.logout','title'=>'Выйти']
    ],
    'top_menu_setup'=>[
        ["route_name"=>"artadmin.password","title"=>"Общие настройки"],
        ["route_name"=>"artadmin.password","title"=>"Настройка почты"],
        ["route_name"=>"artadmin.password","title"=>"Права доступа"],
        ["route_name"=>"artadmin.password","title"=>"Админ.меню"],
        ["route_name"=>"artadmin.password","title"=>"Кеширование"],
        ["route_name"=>"artadmin.password","title"=>"Бекапы"],
        ["route_name"=>"artadmin.password","title"=>"Логи"],
    ],
    "sidebar_menu"=>[
        ["route_name"=>"artadmin.index","title"=>"Главная","icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'],
        ["route_name"=>"artcrud.create",'permission'=>'manage_crud',"title"=>"Создать таблицу","icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'],

        [
            ["route_name"=>"artadmin.password","title"=>"Заказы","icon"=>'<i class="icon-basket-3 feather"></i>'],
            ["route_name"=>"artadmin.password","title"=>"Сообщения","icon"=>'<i class="icon-mail feather"></i>'],
            ["route_name"=>"artadmin.password","title"=>"Запись на прием","icon"=>'<i class="icon-calendar feather"></i>']
        ],
        ["title"=>"Наполнение","icon"=>'<i class="mdi mdi-dots-horizontal"></i>'],
        ["title"=>'Блоки','permission'=>'manage_blocks',"icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package feather-icon"><path d="M12.89 1.45l8 4A2 2 0 0 1 22 7.24v9.53a2 2 0 0 1-1.11 1.79l-8 4a2 2 0 0 1-1.79 0l-8-4a2 2 0 0 1-1.1-1.8V7.24a2 2 0 0 1 1.11-1.79l8-4a2 2 0 0 1 1.78 0z"></path><polyline points="2.32 6.16 12 11 21.68 6.16"></polyline><line x1="12" y1="22.76" x2="12" y2="11"></line><line x1="7" y1="3.5" x2="17" y2="8.5"></line></svg>
',
            'links'=>[
                ['title'=>'Позиции','permission'=>'manage_blocks','route_name'=>"admin_blocks.position.index",'icon'=>'<i></i>'],

                ['title'=>'Блоки','permission'=>'manage_blocks','route_name'=>'admin_blocks.blocks.index','icon'=>'<i></i>'],
                ['title'=>'Добавить блок','permission'=>'manage_blocks','route_name'=>'admin_blocks.blocks.add','icon'=>'<i></i>'],
                ['title'=>'Категории3','route_name'=>'artadmin.password','icon'=>'<i></i>'],
                ['title'=>'Категории4','route_name'=>'artadmin.password','icon'=>'<i></i>'],
                ['title'=>'Категории5','route_name'=>'artadmin.password','icon'=>'<i></i>'],
            ]
        ],
        ["title"=>"Наполнение2","icon"=>'<i class="mdi mdi-dots-horizontal"></i>'],
        ["route_name"=>"artadmin.index","title"=>"Главная","icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'],



    ],


];
