<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateFaqsTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.faqs_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('question');
            $table->text('answer');
            $table->text('question_fr')->nullable();
            $table->text('answer_fr')->nullable();
            $table->text('question_es')->nullable();
            $table->text('answer_es')->nullable();
            $table->integer('active')->default(0);
            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on(Config::get('vcms5.users_table'))
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.faqs_table'));
    }

}
