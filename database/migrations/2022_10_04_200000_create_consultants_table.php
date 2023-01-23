<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->id();
            $table->string('com_name')->nullable();
            $table->tinyInteger('job')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('prefecture')->nullable();
            $table->string('city')->nullable();
            $table->string('building')->nullable();
            $table->tinyInteger('amount')->nullable();
            $table->tinyInteger('income')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('tanto_name')->nullable();
            $table->string('department_name')->nullable();
            $table->string('role_name')->nullable();
            $table->tinyInteger('price')->nullable();
            $table->string('message_title')->nullable();
            $table->string('message_content')->nullable();
            $table->timestamp('expired_at')->nullable();
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
        Schema::dropIfExists('consultants');
    }
}
