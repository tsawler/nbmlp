<?php

return array(

    /*
	|--------------------------------------------------------------------------
	| Config options
	|--------------------------------------------------------------------------
	|
	| Set config options here. Publish with "php artisan vendor:publish"
	|
	*/

    // general options
    'use_fr'                    => true,
    'use_es'                    => true,
    'use_routes'                => true,

    // image size mins
    'min_img_height'            => 150,
    'min_img_width'             => 267,
    'max_img_height'            => 768,
    'max_img_width'             => 1024,
    'thumb_size'                => 200,

    'max_blog_img_width'        => 1024,
    'max_blog_img_height'       => 768,

    // database tables
    'pages_table'               => 'pages',
    'menus_table'               => 'menus',
    'menu_items_table'          => 'menu_items',
    'menu_dropdown_items_table' => 'menu_dropdown_items',
    'roles_table'               => 'roles',
    'users_table'               => 'users',
    'user_roles_table'          => 'user_roles',
    'events_table'              => 'events',
    'galleries_table'           => 'galleries',
    'gallery_items_table'       => 'gallery_items',
    'gallery_tags_table'        => 'gallery_tags',
    'gallery_item_tags_table'   => 'gallery_item_tags',
    'blogs_table'               => 'blogs',
    'blog_posts_table'          => 'posts',
    'users_table'               => 'users',
    'user_prefs_table'          => 'user_prefs',
    'news_table'                => 'news',
    'faqs_table'                => 'faqs',
    'fragments_table'           => 'fragments',

);
