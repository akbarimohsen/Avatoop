<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $guarded = ['id'];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'player_tags', 'player_id', 'tag_id');
    }

    public function nationality(){
        return $this->belongsTo(Nationality::class,'nationality_id');
    }

    public function positions(){
        return $this->belongsToMany(Position::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'player_likers', 'player_id', 'liker_id');
    }

}
