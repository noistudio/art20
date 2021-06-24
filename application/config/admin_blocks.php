<?php


return [
    "tables"=>[
        "blocks"=>'admin_blocks',
        'positions'=>'admin_positions',
    ],
    "url_prefix"=>env('admin_prefix','admin'),
    "public_path_for_files"=>"images",
    "permission"=>"manage_blocks",
    "middlewares"=>["web","artadmin.check_login","artadmin.permission:manage_blocks"],
    "default_render_position"=>"admin_blocks::default_position",
    "render_positions"=>[
        "test_pos2"=>"admin_blocks::position_test_pos"
    ],
    'types'=>[
        "trumbowyg"=>\LaravelTrumbowyg\blocks\trumbowyg\TrumbowygField::class,
        "html"=>\AdminBlocks\fields\html\HtmlField::class,
        "menu"=>\AdminBlocks\fields\menu\MenuField::class,
        'json'=>\AdminBlocks\fields\json\JsonField::class,

    ]


];
