<?php

use Faker\Generator as Faker;

//다른 클래스 참조 하기 위해 사용하는 파일
//define -> 첫번째 인자는 모델 이름, 두번째 인자는 콜백
//$faker -> 인스턴스를 인자를 받고, 배열을 반환한다 (compoer.json 의존성으로 선언되어 있다)
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        //
        'name'=>$faker->name,
        'email'=>$faker->safeEmail,
        'password'=>bcrypt('password'),
        // 테스트 하기 위해 'password'
        'remember_token'=>str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    $date = $faker->dateTimeThisMonth;
    return [
        //
        'title'=>$faker->sentence(),
        'content'=>$faker->paragraph,
        'created_at'=>$date,
        'updated_at'=>$date,
    ];
});
