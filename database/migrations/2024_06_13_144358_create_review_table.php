<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id('id_review');
            $table->string('review', 4000);
            $table->decimal('rating', 3, 1);
            $table->unsignedBigInteger('id_akun'); //ini harusnya tipe nya foreign 
            $table->unsignedBigInteger('movie'); //ini harusnya tipe nya foreign
            $table->timestamps();

            $table->foreign('id_akun')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('movie')->references('id')->on('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
