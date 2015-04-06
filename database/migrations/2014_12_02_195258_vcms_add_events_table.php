<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class VcmsAddEventsTable extends Migration {

    public function up()
    {
        Schema::create(Config::get('vcms5.events_table'), function ($table)
        {
            $table->increments('id');
            $table->string('event_title');
            $table->string('event_text');
            $table->string('event_title_fr')->nullable();
            $table->string('event_text_fr')->nullable();
            $table->string('event_title_es')->nullable();
            $table->string('event_text_es')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->integer('all_day')->default(0);
            $table->integer('active')->default(0);
            $table->timestamps();

            $table->index('start_date');
            $table->index('end_date');
        });
    }

    public function down()
    {
        Schema::drop(Config::get('vcms5.events_table'));
    }

}
