<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('category', 100)->comment('메뉴 카테고리');
            $table->string('title', 100)->comment('메뉴 이름');
            $table->string('sub_title', 255)->nullable()->comment('메뉴 설명');
            $table->string('content', 255)->nullable()->comment('내용');
            $table->decimal('price', 12, 2)->default(0.00)->comment('가격');
            $table->string('tag', 100)->nullable()->comment('태그 (ex. best, new, hot)');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_items');
    }
}