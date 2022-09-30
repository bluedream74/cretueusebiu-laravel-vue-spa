<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('kikan_id')->unique();
            $table->string('com_name');
            $table->string('com_huri_name');
            $table->string('tanto_name');
            $table->string('department_name')->nullable();
            $table->string('role_name')->nullable();
            $table->tinyInteger('is_personal')->nullable();
            $table->tinyInteger('kind')->nullable(); // 一般コンサルタント, 公認会計士, 税理士, 中小企業診断士, 弁護士, 行政書士, 司法書士, 金融機関, その他
            $table->string('zipcode');
            $table->string('prefecture');
            $table->string('city')->nullable();
            $table->string('building')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->text('introduction')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
