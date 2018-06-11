<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_id',
        'title',
        'channel_title',
        'category_id',
        'tags',
        'views' ,
        'likes',
        'dislikes',
        'comment_total',
        'thumbnail_link',
        'date'
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
