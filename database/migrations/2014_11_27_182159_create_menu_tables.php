<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateMenuTables extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.menus_table'), function ($table)
        {
            $table->increments('id');
            $table->string('menu_name')->unique();
            $table->timestamps();
        });

        Schema::create(Config::get('vcms5.menu_items_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('menu_text');
            $table->string('menu_text_fr')->nullable();
            $table->string('menu_text_es')->nullable();
            $table->string('url')->nullable();
            $table->integer('active');
            $table->integer('has_children')->unsigned();
            $table->integer('sort_order')->unsigned();
            $table->integer('page_id')->unsigned()->nullable();
            $table->timestamps();
            $table->index('menu_id');
            $table->index('page_id');
            $table->foreign('menu_id')
                ->references('id')
                ->on(Config::get('vcms5.menus_table'))
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('page_id')
                ->references('id')
                ->on(Config::get('vcms5.pages_table'))
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

        Schema::create(Config::get('vcms5.menu_dropdown_items_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('menu_item_id')->unsigned();
            $table->string('menu_text');
            $table->string('menu_text_fr')->nullable();
            $table->string('menu_text_es')->nullable();
            $table->string('url')->nullable();
            $table->integer('active');
            $table->integer('sort_order')->unsigned();
            $table->integer('page_id')->unsigned()->nullable();
            $table->timestamps();
            $table->index('menu_item_id');
            $table->index('page_id');
            $table->foreign('menu_item_id')
                ->references('id')
                ->on(Config::get('vcms5.menu_items_table'))
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('page_id')
                ->references('id')
                ->on(Config::get('vcms5.pages_table'))
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('vcms5.menu_dropdown_items_table'), function($table)
        {
            $table->dropForeign('menu_dropdown_items_menu_item_id_foreign');
            $table->dropForeign('menu_dropdown_items_page_id_foreign');
        });

        Schema::table(Config::get('vcms5.menu_items_table'), function($table)
        {
            $table->dropForeign('menu_items_menu_id_foreign');
            $table->dropForeign('menu_items_page_id_foreign');
        });

        Schema::drop(Config::get('vcms5.menus_table'));
        Schema::drop(Config::get('vcms5.menu_items_table'));
        Schema::drop(Config::get('vcms5.menu_dropdown_items_table'));
    }

}
