<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = ['title', 'logo', 'description', 'score_count', 'score', 'league_id'];


    public function players(){
        return $this->hasMany(Player::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'teams_tags', 'team_id', 'tag_id');
    }

    public function league(){
        return $this->belongsTo(League::class);
    }

    public function likers()
    {
        return $this->belongsToMany(Team::class, 'team_likers', 'team_id', 'liker_id');
    }
}
