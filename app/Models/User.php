<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array('name', 'email', 'des', 'phone', 'city_id', 'nationality', 'whats_number', 'years_skills', 'degree', 'type', 'password', 'is_busy', 'price_rate', 'personal_rate', 'quality_rate');


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function adds()
    {
        return $this->hasMany('App\Models\Add');
    }


    public function messages()
    {
        return $this->hasMany('App\Models\Message');
    }
    public function invites()
    {
        return $this->hasMany('App\Models\Invite');
    }

    public function commission()
    {
        return $this->hasMany('App\Models\Commision');
    }


    public function rates()

    {
        return $this->hasMany('App\Models\Rate');
    }

    public function offers()

    {
        return $this->hasMany('App\Models\Offer');
    }

    public function media()
    {
        return $this->morphOne('App\Models\Media', 'mediaable');
    }

    public function skills()
    {
        return $this->hasMany('App\Models\Skill');
    }


}
