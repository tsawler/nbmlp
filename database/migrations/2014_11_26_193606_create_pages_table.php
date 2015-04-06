<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreatePagesTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.pages_table'), function ($table)
        {
            $table->increments('id');
            $table->string('page_title')->unique();
            $table->text('page_content');
            $table->string('page_title_fr')->nullable();
            $table->text('page_content_fr')->nullable();
            $table->string('page_title_es')->nullable();
            $table->text('page_content_es')->nullable();
            $table->timestamps();
            $table->integer('active');
            $table->string('meta')->nullable();
            $table->string('slug');
            $table->string('slug_fr')->nullable();
            $table->string('slug_es')->nullable();
            $table->string('meta_tags')->nullable();

            $table->index('slug');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.pages_table'));
    }

}
