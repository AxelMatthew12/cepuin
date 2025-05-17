<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'caption',
        'img_path',
        'video_path',
        'upvote',
        'downvote',
        'comment_count',
        'clean_vote',
        'location',
        'time_happening',
        'geo_location',
        'topic_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function location()
    {
        return $this->belongsTo(Regency::class, 'location');
    }
}
