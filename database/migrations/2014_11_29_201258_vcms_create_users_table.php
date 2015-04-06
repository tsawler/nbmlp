<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateUsersTable extends Migration {

    public function up()
    {
        Schema::table(Config::get('vcms5.users_table'), function ($table)
        {
            $table->dropColumn('name');
        });

        Schema::table(Config::get('vcms5.users_table'), function ($table)
        {
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('user_active');
            $table->integer('access_level');
            $table->index('email');
        });
    }

    public function down()
    {
        Schema::table(Config::get('vcms5.users_table'), function ($table)
        {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('user_active');
            $table->dropColumn('access_level');
        });

        Schema::table(Config::get('vcms5.users_table'), function ($table)
        {
            $table->string('name')->nullable();
        });
    }

}
