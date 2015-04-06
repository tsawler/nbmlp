<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateBlogs extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.blogs_table'), function ($table)
        {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('title_fr')->nullable();
            $table->string('title_es')->nullable();
            $table->integer('active')->default(0);
            $table->timestamps();
            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.blogs_table'));
    }

}
