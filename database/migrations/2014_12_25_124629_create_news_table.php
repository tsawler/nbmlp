<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateNewsTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.news_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('news_text');
            $table->string('title_fr')->nullable();
            $table->text('news_text_fr')->nullable();
            $table->string('title_es')->nullable();
            $table->text('news_text_es')->nullable();
            $table->string('slug')->unique();
            $table->integer('active')->default(0);
            $table->date('news_date')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('slug');
            $table->index('news_date');

            $table->foreign('user_id')
                ->references('id')
                ->on(Config::get('vcms5.users_table'))
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.news_table'));
    }

}
