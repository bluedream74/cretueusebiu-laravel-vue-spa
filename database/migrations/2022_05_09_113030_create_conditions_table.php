<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conditions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('age_min')->nullable();
            $table->integer('age_max')->nullable();
            $table->text('sexality')->nullable();
            $table->text('area')->nullable();
            $table->integer('height_min')->nullable();
            $table->integer('height_max')->nullable();
            $table->text('body_type')->nullable();
            $table->text('job')->nullable();
            $table->text('holiday')->nullable();
            $table->text('salary')->nullable();
            $table->text('study')->nullable();
            $table->text('liquor')->nullable();
            $table->text('tobacco')->nullable();
            $table->text('partner')->nullable();
            $table->text('history')->nullable();
            $table->text('style')->nullable();
            $table->text('child')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conditions');
    }
}
