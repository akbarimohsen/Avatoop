<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrange extends Model
{
//    protected $guarded = ['id'];
    use HasFactory;

    public function schematic()
    {
        return $this->belongsTo(Schematic::class);
    }
}
