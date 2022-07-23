<?php

namespace App\Models\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
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
        return $this->belongsToMany(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
}
