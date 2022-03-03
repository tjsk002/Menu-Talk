<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //each -> 모델 팩토리에 user_id 정의가 없으므로 사용자와의 관계를 이용해서 포럼 글을 만든다
        $users = App\User::all();

        //$users 변수에 사용자 컬렉션을 담고, 컬렉션을 순회하면서 포럼 글을 만든다
        $users->each(function($user){
            $user->articles()->save(
                factory(App\Article::class)->make()
                // 새로운 인스턴스를 반환하고, 데이터 베이스에는 저장하지 않는다
            );
        });
    }
}
