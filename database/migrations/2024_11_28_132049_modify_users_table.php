<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number', 50)->nullable()->after('name')->comment('개인 연락처');
            $table->string('business_id', 50)->after('remember_token')->comment('사업자 번호');
            $table->string('status', 50)->after('business_id')->default('active')->comment('회원상태');
            $table->string('company_name', 50)->after('status')->comment('회사명');
            $table->string('company_number', 50)->nullable()->after('company_name')->comment('회사 연락처');
            $table->softDeletes()->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
               'phone_number',
               'business_id',
               'status',
               'company_name',
               'company_number',
               'deleted_at',
           ]);
        });
    }
}