<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsCreateFragmentsTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.fragments_table'), function ($table)
        {
            $table->increments('id');
            $table->integer('page_id')->unsigned()->nullable();
            $table->string('fragment_title')->nullable();
            $table->text('fragment_text')->nullable();
            $table->string('fragment_title_fr')->nullable();
            $table->text('fragment_text_fr')->nullable();
            $table->string('fragment_title_es')->nullable();
            $table->text('fragment_text_es')->nullable();
            $table->timestamps();

            $table->index('page_id');

            $table->foreign('page_id')
                ->references('id')
                ->on(Config::get('vcms5.pages_table'))
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.fragments_table'));
    }

}
