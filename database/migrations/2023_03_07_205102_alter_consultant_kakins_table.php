<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterConsultantKakinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultant_kakins', function(Blueprint $table) {
            $table->integer('price')->default(500);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultant_kakins', function(Blueprint $table) {
            $table->dropstringColumn(['price']);
        });
    }
}
