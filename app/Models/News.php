<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = ['title' , 'description', 'created_at', 'body', 'img', 'video', 'views' , 'reporter_id'];

    public function repoter(){
        return $this->belongsTo(User::class,'reporter_id' );
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'news_categories', 'news_id', 'category_id');
    }
    public function commnets(){
        return $this->hasMany(Comment::class);
    }
    public function likers(){
        return $this->belongsToMany(User::class, 'news_likers', 'news_id', 'liker_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'news_tags','news_id', 'tag_id');
    }

}
