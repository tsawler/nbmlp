<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLettersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up() {
        Schema::create('letters', function($table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->string('recipient')->nullable();
            $table->string('letter_name');
            $table->date('letter_date');
            $table->text('description');
            $table->text('letter_text')->nulable();
            $table->timestamps();
            $table->integer('active');

            $table->index('author_id');

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down() {
        Schema::drop('letters');
    }

}
