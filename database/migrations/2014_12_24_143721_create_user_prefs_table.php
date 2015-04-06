<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateUserPrefsTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.user_prefs_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('avatar')->nullable();
            $table->string('username')->nullable();
            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')
                ->references('id')
                ->on(Config::get('vcms5.users_table'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.user_prefs_table'));
    }

}
