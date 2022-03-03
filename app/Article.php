<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title',
        'content',
        'notification',
        'view_count',
        'notification',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'notification',
        'deleted_at',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'user',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
//    protected $dates = [
//        'deleted_at'
//    ];


    /**
     * 만약, authors 외래키로 사용한다고 하면 public function authors(){
     * return $this->belongTo(User::class, 'author_id')}
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    /* Relationships */

    public function user()
    {
        // user 소속이다
        return $this->belongsTo(User::class);
    }

//    public function tags() {
//        return $this->belongsToMany(Tag::class);
//    }
//
//    public function attachments() {
//        return $this->hasMany(Attachment::class);
//    }
//
//    public function comments() {
//        return $this->morphMany(Comment::class, 'commentable');
//    }

    /* Accessor */

//    public function getCommentCountAttribute() {
//        return (int) $this->comments->count();
//    }
}