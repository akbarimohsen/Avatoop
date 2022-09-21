<?php

namespace App\Models\User;

use App\Models\Admin\Rss;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $guarded = [];
    
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function rss()
    {
        return $this->belongsTo(Rss::class);
    }
}
