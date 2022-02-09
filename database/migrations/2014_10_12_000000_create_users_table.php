<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->string('authors',function(Blueprint $table){
                    $table->string('confirm_code',60)->nullable();
                    $table->boolean('activated')->default(0);
                    // boolean() -> mysql 에서 tinyint 열 타입으로 해석된다
                    // 기본값 0, 사용자가 가입을 확인하면 값이 1로 변경된다
                });
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            // rememberToken() -> 사용자 로그인 기억할때 사용한다
            $table->timestamps();
        });

        Schema::table('authors', function(Blueprint $table){
            $table->string('confirm_code', 60)->nullable();
            $table->boolean('activated')->default(0);

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
}
