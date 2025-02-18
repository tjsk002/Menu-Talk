<?php

namespace App\Domains\Menu\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu_items';

    protected $fillable = [
        'id',
        'user_id',
        'category',
        'title',
        'sub_title',
        'price',
        'img_url',
        'tag',
    ];

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getSubTitle(): ?string
    {
        return $this->sub_title;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function getImgUrl(): ?string
    {
        return $this->img_url;
    }

    public function getTag(): ?string
    {
        return $this->tag;
    }
}
