<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    protected $fillable = ['date', 'stadium', 'player1_id', 'player2_id', 'league_id'];

    public function leagues(){
        return $this->belongsTo(League::class);
    }

    public function team1(){
        return $this->hasOne(Team::class, 'player1_id');
    }

    public function team2(){
        return $this->belongsTo(Team::class, 'player2_id');
    }

}
