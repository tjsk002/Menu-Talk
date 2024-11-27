<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
        {
            return $this->email;
        }
}