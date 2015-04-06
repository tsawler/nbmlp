<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateUserRolesTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.user_roles_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->string('role');
            $table->timestamps();
            $table->index('user_id');
            $table->index('role_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on(Config::get('vcms5.roles_table'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.user_roles_table'));
    }

}
