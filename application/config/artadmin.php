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
    "url_prefix"=>env("admin_prefix"),
    'guard'=>'admin',
    'top_menu_right'=>[
        ["icon"=>"icon-edit","route_name"=>"artadmin.password","title"=>"current_user"],

        ["icon"=>"icon-logout","route_name"=>'artadmin.logout','title'=>'Выйти']
    ],
    'top_menu_setup'=>[
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.admins.list","title"=>"Все администраторы"],
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.roles.list","title"=>"Роли"],
        ["icon"=>"icon-users",'permission'=>'root',"route_name"=>"artadmin.permissions.list","title"=>"Права доступа"],
        ["icon"=>"icon-edit","route_name"=>"artadmin.clear_cache","title"=>'Очистить кеш'],

    ],

    "sidebar_menu"=>[
        ["route_name"=>"artadmin.index","title"=>"Главная","icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'],
        ["route_name"=>"artcrud.create",'permission'=>'manage_crud',"title"=>"Создать таблицу","icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home feather-icon"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>'],

    






        ["title"=>"Наполнение","icon"=>''],




        ["title"=>'Медиа', "icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open feather-icon"><path class="st0" d="M18.86,23.04H5.18C2.87,23.04,1,21.16,1,18.86V5.18C1,2.87,2.87,1,5.18,1h13.68c2.31,0,4.18,1.87,4.18,4.18
		v13.68C23.04,21.16,21.16,23.04,18.86,23.04z"/><path class="st0" d="M23.04,15.74l-3.99-3.99l-7.81,7.81l-3.38-3.38l-5.73,5.73"/><circle class="st0" cx="8.69" cy="9.28" r="2.44"/></svg>',
            'links'=>[
                ["route_name"=>'artadmin.filemanager','title'=>'Файловый менеджер','icon'=>'']

            ]
        ],








        ["title"=>"Структура","icon"=>''],

        ["title"=>'Блоки','permission'=>'manage_blocks',"icon"=>'<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid feather-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
            'links'=>[
                ['title'=>'Позиции','permission'=>'manage_blocks','route_name'=>"admin_blocks.position.index",'icon'=>'<i></i>'],

                ['title'=>'Блоки','permission'=>'manage_blocks','route_name'=>'admin_blocks.blocks.index','icon'=>'<i></i>'],

            ]
        ],





    ],


];
