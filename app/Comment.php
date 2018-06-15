<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'video_id',
        'comment_text',
        'likes',
        'replies'
    ];

    public function video()
    {
        return $this->belongsTo('App\Video', 'video_id');
    }
}
