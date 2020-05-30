<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
          $table->increments('id');
          $table->timestamps();
          $table->unsignedInteger('reviewee_id');
          $table->integer('pt_score'); // PT-Score is the personality type score on a given personality type. +/- 5 based @ Personality Chosen for Reviewee
          $table->string('personality', '25');
          $table->integer('q1');
          $table->integer('q2');
          $table->integer('q3');
          $table->integer('q4');
          $table->integer('q5');
          $table->integer('q6');
          $table->integer('q7');
          $table->integer('q8');
          $table->integer('q9');
          $table->integer('q10');
          $table->text('pros')->nullable();
          $table->text('cons')->nullable();
          $table->text('snapchat_url')->nullable();
          $table->text('facebook_url')->nullable();
          $table->text('instagram_url')->nullable();
          $table->boolean('recommend'); // Used for % score on Profile
      });

      // Relationship
      Schema::table('reviews', function($table) {
        $table->foreign('reviewee_id')->references('id')->on('reviewees')->onDelete('cascade');
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
