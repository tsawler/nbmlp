<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLetterDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('letter_details', function($table) {
            $table->increments('id');
            $table->integer('letter_id')->unsigned();
            $table->integer('sort_order');
            $table->string('letter_image')->nullable();
            $table->timestamps();

            $table->index('letter_id');

            $table->foreign('letter_id')
                ->references('id')
                ->on('letters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down() {
        Schema::drop('letter_details');
    }

}
