<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('clinic_id');
            $table->integer('client_id');
            $table->integer('collaborator_id');
            $table->integer('appointment_status_id');
            $table->string('title')->nullable(false);
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('note')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
