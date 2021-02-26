<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('review_for')->unsigned()->index()->default(0);
            $table->biginteger('review_by')->unsigned()->index()->default(0);
            $table->float('rating');
            $table->longText('comment');
            $table->date('review_date');
            $table->timestamps();
        });

        Schema::table('reviews', function($table) {
            $table->foreign('review_for')->references('id')->on('professors');
            $table->foreign('review_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
