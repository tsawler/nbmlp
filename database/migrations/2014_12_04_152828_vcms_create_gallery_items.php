<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateGalleryItems extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('vcms5.gallery_items_table'), function ($table)
        {
            $table->increments('id');
            $table->string('item_name');
            $table->text('item_description');
            $table->string('item_name_fr')->nullable();
            $table->text('item_description_fr')->nullable();
            $table->string('item_name_es')->nullable();
            $table->text('item_description_es')->nullable();
            $table->integer('active');
            $table->integer('gallery_id')->unsigned();
            $table->string('image_name');
            $table->timestamps();
            $table->index('gallery_id');
            $table->foreign('gallery_id')->references('id')->on(Config::get('vcms5.galleries_table'))->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.gallery_items_table'));
    }

}
