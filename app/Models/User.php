<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'password',
        'business_id',
        'status',
        'company_name',
        'company_number',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }

    public function getBusinessId (): string
    {
        return $this->business_id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCompanyName(): string
    {
        return $this->company_name;
    }

    public function getCompanyNumber(): string
    {
        return $this->company_number;
    }
}