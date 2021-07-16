Админка с панелью для laravel 8

Админка включает в себя собственные пакеты:

https://github.com/noistudio/artcrud

https://github.com/noistudio/admin-blocks

https://github.com/noistudio/laravel-trumbowyg

https://github.com/noistudio/artadmin



Также используется стороний пакет для файлового менеджера 
https://github.com/UniSharp/laravel-filemanager

1.  composer create-project
2. php artisan vendor:publish --tag=lfm_public --tag=admin_blocks --tag=artcrud --tag=laravel-trumbowy
   g --tag=artadmin

3.  php artisan migrate
4.  php artisan artadmin:adduser {email} {password}


Данный пакет является реинкарнацией идей https://github.com/noistudio/art_laravel
Но в более современном и расширенном формате, с поддержкой блоков, системы для создания  админок(миграции,модели,контроллеры,views)
ну и естественно с системой распределения прав

# В работе над этим мне очень помог http://dzenburo.ru/ без него, все это не случилось бы. Так что такие дела.


