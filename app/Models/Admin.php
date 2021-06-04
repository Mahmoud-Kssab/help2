<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{

    use HasFactory,HasApiTokens, HasRoles;

    protected $table = 'admins';
    // protected $guard_name = 'admin';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'password', 'activate' ,'roles_name');
    protected $hidden = array('password');
    protected $casts = [

        'roles_name' => 'array',

        ];

}
