<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssAudio extends Model
{
    protected $guarded = ['id'];
    use HasFactory;

    public function rss()
    {
        return $this->belongsTo(Rss::class);
    }
}
