<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'youtube_url', 'target_audience'
    ];

    // Relasi ke komentar
    public function comments()
    {
        return $this->hasMany(VideoComment::class);
    }

    // Relasi ke like/dislike
    public function likes()
    {
        return $this->hasMany(VideoLike::class);
    }

    // Helper: ambil ID YouTube untuk embed
public function getYoutubeIdAttribute()
{
    $url = $this->youtube_url;
    // Tangkap semua format URL YouTube
    if (preg_match('/(?:youtu\.be\/|youtube\.com\/(?:watch\?(?:.*&)?v=|embed\/|v\/|.+\?v=))([A-Za-z0-9_-]{11})/', $url, $matches)) {
        return $matches[1];
    }
    return null;
}


    public function likeCount()
    {
        return $this->likes()->where('type', 'like')->count();
    }

    public function dislikeCount()
    {
        return $this->likes()->where('type', 'dislike')->count();
    }

    public function isLikedBy($user)
{
    if (!$user) return false; // Jika user belum login
    return $this->likes()
        ->where('user_id', $user->id)
        ->where('type', 'like')
        ->exists();
}

}
