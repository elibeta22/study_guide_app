<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('published_by')->unsigned()->index()->default(0);
            $table->biginteger('published_to')->unsigned();
            $table->string('document_name');
            $table->string('document_type');
            $table->string('document_size');
            $table->string('document');
            $table->timestamps();
        });

        Schema::table('study_data', function($table) {
//            $table->foreign('professor_id')->references('id')->on('users');
            $table->foreign('published_by')->references('id')->on('users');
            $table->foreign('published_to')->references('id')->on('professors');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('study_data');
    }
}
