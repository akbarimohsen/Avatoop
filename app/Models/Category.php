<?php

namespace App\Models;

use App\Models\Admin\Rss;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['name'];

    public function news(){
        return $this->belongsToMany(News::class, 'news_categories', 'category_id', 'news_id' );
    }

    public function rsses()
    {
        return $this->belongsToMany(Rss::class);
    }
}
