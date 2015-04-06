<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateGalleryTags extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.gallery_tags_table'), function ($table)
        {
            $table->increments('id');
            $table->string('tag_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.gallery_tags_table'));
    }

}
