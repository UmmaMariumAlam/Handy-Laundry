<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('review_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('review_id');
            $table->text('reply');
            $table->timestamps();

            $table->foreign('review_id')->references('review_id')->on('reviews')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_replies');
    }
};
