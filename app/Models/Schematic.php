<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schematic extends Model
{
//    protected $guarded = ['id'];
    use HasFactory;

    public function arranges()
    {
        return $this->hasMany(Arrange::class);
    }


}
