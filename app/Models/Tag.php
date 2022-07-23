<?php

namespace App\Models;

use App\Models\Admin\Rss;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = ['name', 'views'];

    public function news(){
        return $this->belongsToMany(News::class, 'news_tags', 'tag_id', 'news_id');
    }

    public function teams(){
        return $this->belongsToMany(Team::class, 'teams_tags', 'tag_id', 'team_id');
    }

    public function players(){
        return $this->belongsToMany(Player::class, 'player_tags', 'player_id', 'tag_id');
    }

    public function rsses()
    {
        return $this->belongsToMany(Rss::class);
    }
}
