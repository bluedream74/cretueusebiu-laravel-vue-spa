<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nickname');
            $table->tinyInteger('gender');
            $table->integer('age');
            $table->integer('sexality');
            $table->integer('area');
            $table->integer('height')->nullable();
            $table->integer('body_type')->nullable();
            $table->integer('job')->nullable();
            $table->integer('holiday')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('study')->nullable();
            $table->integer('liquor')->nullable();
            $table->integer('tobacco')->nullable();
            $table->integer('partner')->nullable();
            $table->integer('history')->nullable();
            $table->integer('style')->nullable();
            $table->integer('child')->nullable();
            $table->text('introduction')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
