<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';

    protected $fillable = ['title', 'description', 'title', 'created_at', 'status', 'user_id', 'news_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function news(){
        return $this->belongsTo(News::class);
    }

}
