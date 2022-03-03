<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seedsZ
     * @return void
     *
     * 데터터베이스 테이블에 데이터를 심는 행위 : seeding -> 자동화
     */
    public function run()
    {
        // seeding 로직은 run() 안에 넣어줘야 한다
//        App\user::create([
//            'name'=>sprintf('%s %s', str_random(3), str_random(4)),
//            'email'=>str_random(10) . '@example.com',
//            'password'=>bcrypt('password'),
//        ]);

        factory(App\User::class, 5)->create();
    }
}
