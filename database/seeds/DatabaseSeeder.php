<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *
     * 모델마다 아티즌 시딩 명령을 수행하기 어렵기 때문에 만들어주는 작업
     * 원래 실행 -> php artisan db:seed --class=UsersTableSeeder
     * seeder class 등록할 수 있는 마스터 시더 클래스 제공
     * 시딩의 순서때문에 필요하다
     * -> 마이그레이션할때 외래키와 연결할 다른 테이블의 열이 없으면 오류 발생하는것처럼 시딩도 마찬가지
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        if(config('database.default')!== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

//        Model::unguard();

        /**
         * Model::unguard();
         * Model::requard();
         * 엘로퀀트 모델에 정의한 대량 할당 제약 사항을 풀었다가 잠그는 명령
         */

        App\User::truncate();
        // truncate -> 테이블에 담긴 모든 데이터를 버린다. delete != truncate 기본키 1부터 재배열
        $this->call(UsersTableSeeder::class);

        App\Article::truncate();
        $this->call(ArticlesTableSeeder::class);

//        Model::requard();

        if(config('database.default')!=='sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
