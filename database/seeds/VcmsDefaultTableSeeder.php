<?php

use Illuminate\Database\Seeder;
use Tsawler\Vcms5\models\Page;
use Tsawler\Vcms5\models\Menu;
use Tsawler\Vcms5\models\Blog;
use Tsawler\Vcms5\models\BlogPost;
use Tsawler\Vcms5\models\Fragment;
use Tsawler\Vcms5\models\GalleryItem;
use vTsawler\Vcms5\models\Gallery;
use Tsawler\Vcms5\models\MenuDropdownItem;
use Tsawler\Vcms5\models\MenuItem;
use Tsawler\Vcms5\models\News;
use Tsawler\Vcms5\models\Role;
use Tsawler\Vcms5\models\UserPref;
use Tsawler\Vcms5\models\UserRole;
use Tsawler\Vcms5\models\VcmsUser;
use App\User;

class VcmsDefaultTableSeeder extends Seeder {

    public function run()
    {
        \Eloquent::unguard();

        \DB::table(\Config::get('vcms5.pages_table'))->delete();

        Page::create(array(
            'page_title'      => 'Home',
            'page_content'    => 'This is the home page.',
            'page_title_fr'   => 'Accueil',
            'page_content_fr' => 'This is the home page in French.',
            'page_title_es'   => 'Incio',
            'page_content_es' => 'This is the home page in Spanish.',
            'active'          => '1',
            'meta'            => 'meta',
            'slug'            => 'home',
            'slug_fr'         => 'accueil',
            'slug_es'         => 'incio',
            'meta_tags'       => 'tags'
        ));

        \DB::table(\Config::get('vcms5.menus_table'))->delete();

        Menu::create(array(
            'menu_name' => 'Main Menu'
        ));

        \DB::table(\Config::get('vcms5.menu_items_table'))->delete();

        MenuItem::create(array(
            'menu_id'      => '1',
            'menu_text'    => 'Home',
            'menu_text_fr' => 'Home',
            'url'          => '',
            'active'       => '1',
            'has_children' => '0',
            'sort_order'   => '1',
            'page_id'      => '1'
        ));

        \DB::table(\Config::get('vcms5.roles_table'))->delete();

        Role::create(
            array('id' => '1', 'role_name' => 'Manage Pages', 'role' => 'pages'));
        Role::create(
            array('id' => '2', 'role_name' => 'Manage Calendar Events', 'role' => 'events'));
        Role::create(
            array('id' => '3', 'role_name' => 'Manage Blogs', 'role' => 'blogs'));
        Role::create(
            array('id' => '4', 'role_name' => 'Manage Galleries', 'role' => 'galleries'));
        Role::create(
            array('id' => '5', 'role_name' => 'Manage Users', 'role' => 'users'));
        Role::create(
            array('id' => '6', 'role_name' => 'Manage Menus', 'role' => 'menus'));
        Role::create(
            array('id' => '7', 'role_name' => 'Manage News', 'role' => 'news'));
        Role::create(
            array('id' => '8', 'role_name' => 'Manage FAQs', 'role' => 'faqs'));


        \DB::table('users')->delete();

        User::create(
            array(
                'id'           => '1',
                'email'        => 'trevor.sawler@me.com',
                'first_name'   => 'Trevor',
                'last_name'    => 'Sawler',
                'password'     => \Hash::make('marlow11'),
                'user_active'  => 1,
                'access_level' => 3
            )
        );

        \DB::table(\Config::get('vcms5.user_roles_table'))->delete();

        UserRole::create(
            array('id' => '1', 'user_id' => '1', 'role_id' => '1', 'role' => 'pages'));
        UserRole::create(
            array('id' => '2', 'user_id' => '1', 'role_id' => '2', 'role' => 'events'));
        UserRole::create(
            array('id' => '3', 'user_id' => '1', 'role_id' => '3', 'role' => 'blogs'));
        UserRole::create(
            array('id' => '4', 'user_id' => '1', 'role_id' => '4', 'role' => 'galleries'));
        UserRole::create(
            array('id' => '5', 'user_id' => '1', 'role_id' => '5', 'role' => 'users'));
        UserRole::create(
            array('id' => '6', 'user_id' => '1', 'role_id' => '6', 'role' => 'menus'));
        UserRole::create(
            array('id' => '7', 'user_id' => '1', 'role_id' => '7', 'role' => 'news'));
        UserRole::create(
            array('id' => '8', 'user_id' => '1', 'role_id' => '8', 'role' => 'faqs'));

    }

}