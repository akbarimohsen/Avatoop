<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $table = 'leagues';

    protected $fillable = ['title', 'logo', 'teams_count'];

    public function games(){
        return $this->hasMany(Game::class);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }
}
