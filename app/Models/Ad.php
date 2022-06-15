<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = 'advertises';

    protected $fillable = ['img', 'link', 'cost', 'created_at'];

    public $timestamps = false;


}
