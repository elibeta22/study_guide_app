<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('school_name');
            $table->string('school_location');
            $table->bigInteger('school_state_id')->unsigned()->index()->default(0);
            $table->integer('school_total_top_professors');
            $table->timestamps();
        });
        Schema::table('schools', function($table) {
            $table->foreign('school_state_id')->references('id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
