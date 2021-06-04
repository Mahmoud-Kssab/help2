<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Skill extends Authenticatable
{

    use HasFactory,HasApiTokens, HasRoles;

    protected $table = 'skills';
    // protected $guard_name = 'admin';
    public $timestamps = true;
    protected $fillable = array('name');


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }



}
