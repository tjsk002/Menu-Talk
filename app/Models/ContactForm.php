<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    use HasFactory;

    protected $table = 'contact_forms';
    protected $fillable = [
        'user_id',
        'name',
        'title',
        'phone_number',
        'email',
        'message',
        'lang',
        'ip',
        'user_agent',
    ];

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }
}