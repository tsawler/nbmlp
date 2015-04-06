<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateGalleryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('vcms5.galleries_table'), function ($table)
        {
            $table->increments('id');
            $table->string('gallery_name');
            $table->string('gallery_name_fr');
            $table->string('gallery_name_es');
            $table->integer('active');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.galleries_table'));
    }

}
