<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevieweesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviewees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 25);
            $table->double('rating')->nullable(); // Can be empty when first creating profile
            $table->text('image');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviewees');
    }
}
