<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateGalleryItemTags extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.gallery_item_tags_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('gallery_item_id')->unsigned();
            $table->integer('gallery_tag_id')->unsigned();;
            $table->timestamps();
            $table->index('gallery_item_id');
            $table->index('gallery_tag_id');
            $table->foreign('gallery_item_id')
                ->references('id')
                ->on(Config::get('vcms5.gallery_items_table'))
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('gallery_tag_id')
                ->references('id')
                ->on(Config::get('vcms5.gallery_tags_table'))
                ->onDelete('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.gallery_item_tags_table'));
    }

}
