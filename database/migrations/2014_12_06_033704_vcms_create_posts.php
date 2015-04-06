<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreatePosts extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.blog_posts_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('blog_id')->unsigned();
            $table->string('title');
            $table->text('summary');
            $table->text('content');
            $table->string('title_fr')->nullable();
            $table->text('summary_fr')->nullable();
            $table->text('content_fr')->nullable();
            $table->string('title_es')->nullable();
            $table->text('summary_es')->nullable();
            $table->text('content_es')->nullable();
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->text('meta')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamp('post_date');
            $table->integer('active')->default(0);
            $table->timestamps();
            $table->index('slug');
            $table->index('blog_id');
            $table->foreign('blog_id')
                ->references('id')
                ->on(Config::get('vcms5.blogs_table'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')
                ->on(Config::get('vcms5.users_table'))
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.blog_posts_table'));
    }

}
