<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobinquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobinquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('lookingFor')->nullable();
            $table->string('Time')->nullable();
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->string('file')->nullable();
            $table->string('job_id')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobinquiries');
    }
}
