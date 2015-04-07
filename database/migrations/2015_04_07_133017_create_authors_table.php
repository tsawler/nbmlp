<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('authors', function($table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
            $table->integer('active');
        });
    }

    public function down() {
        Schema::drop('authors');
    }

}
