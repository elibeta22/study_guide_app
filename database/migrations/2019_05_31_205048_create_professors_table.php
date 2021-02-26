<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Biginteger('professor_user_id')->unsigned()->index();
            $table->string('professor_name');
            $table->Biginteger('school_id')->unsigned()->index();
            $table->BigInteger('department_id')->unsigned()->index();
            $table->timestamps();
        });
        Schema::table('professors', function($table) {
            $table->foreign('professor_user_id')->references('id')->on('users');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('professors');
    }
}
