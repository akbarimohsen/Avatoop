<?php

namespace App\Models;

use App\Models\Admin\Rss;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = ['user_ip', 'rss_id', 'news_id', 'title'];

    public function rss()
    {
        $this->belongsTo(Rss::class);
    }

    public function new()
    {
        $this->belongsTo(News::class);
    }
}
