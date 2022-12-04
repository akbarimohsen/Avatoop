<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class RssComment extends Model
{
    protected $guarded=['id'];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function rsses()
    {
        return $this->belongsTo(Rss::class);
    }
}
