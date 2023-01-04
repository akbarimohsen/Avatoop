<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\liker_rss;
use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
use App\Models\User\like;
use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rss extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function rss_comments(){
        return $this->hasMany(RssComment::class);
    }
    public function likers(){
        return $this->belongsToMany(User::class,'liker_rss','rss_id','user_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    public function rss_audio()
    {
        return $this->hasOne(RssAudio::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
