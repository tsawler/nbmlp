<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateRolesTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.roles_table'), function ($table)
        {
            $table->increments('id');
            $table->string('role_name');
            $table->string('role');
            $table->integer('active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.roles_table'));
    }

}
