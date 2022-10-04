<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantMisssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultant_misss', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('consultant_id')->unsigned()->nullable();
            $table->foreign('consultant_id')->references('id')->on('consultants')->onDelete('cascade');
            $table->tinyInteger('miss_id');
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
        Schema::dropIfExists('consultant_misss');
    }
}
