<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssComment extends Model
{
    protected $guarded=['id'];
    use HasFactory;

    public function rsses()
    {
        return $this->belongsTo(Rss::class);
    }
}
