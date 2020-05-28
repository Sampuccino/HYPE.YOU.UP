<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('review_id');
            $table->string('name', 25);
            $table->text('image');
            $table->text('body');
            $table->double('rating'); // Used for aggregating total rating score
            $table->boolean('recommend'); // Used for % score on Profile
        });

      // Relationship
      Schema::table('comments', function($table) {
        $table->foreign('review_id')->references('id')->on('reviews')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
