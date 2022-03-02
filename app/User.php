<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getGravatarUrlAttribute(){
        return sprintf("//www.gravatar.com/avatar/%s?s=%s?", md5($this->email), 48);
    }

    protected $fillable = [
        // id, pw, name, email
        'name', 'email', 'password', 'confirm_code'
//        'businessNumber'
//        'confirm_code', 'activated', '...'
    ];

//    protected $with = [
//        'article'
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 프로퍼티 값을 은닉하는 방법 -> hidden
        'password', 'confirm_code','remember_token',
//        'confirm_code', '...'
    ];

    protected $casts = [
        'activated' => 'boolean',

    ];

    protected $table = 'authors';


    public function articles(){
        // 여러개의 article 가지고 있다
        var_dump(1);
        return $this->hasMany(Article::class);
    }

}
