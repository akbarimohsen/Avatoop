<?php

namespace App\Models;

use App\Models\Admin\Rss;
use App\Models\User\like;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'phone_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }


    public function news(){
        return $this->hasMany(News::class,'reporter_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function teams_likes()
    {
        return $this->belongsToMany(Team::class, 'team_likers', 'liker_id', 'team_id');
    }

    public function players_likes()
    {
        return $this->belongsToMany(Player::class, 'player_likers', 'liker_id', 'player_id');
    }
    public function userTotalOnline()
    {
        return $this->hasOne(userTotalOnline::class);
    }



    public function AudioNews()
    {
        return $this->belongsToMany(AudioNews::class, 'user_audio_news', 'user_id', 'audioNews_id');
    }

    public function rsses()
    {
     return $this->belongsToMany(Rss::class,'liker_rss','user_id','rss_id');
    }

    public function Profile()
    {
        return $this->hasMany(Profile::class);
    }

    public function likes()
    {
        return $this->hasMany(like::class);
    }


}
