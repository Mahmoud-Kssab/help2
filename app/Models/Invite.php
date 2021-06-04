<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model 
{

    protected $table = 'invites';
    public $timestamps = true;


    protected $fillable = array('name','invited_id','active','inviter_id');

    public function user()
    
    {
        return $this->hasMany('App\Models\User');
    }

    public function invited()
    {
        return $this->belongsTo('App\Models\User', 'invited_id');
    }

    public function inviter()
    {
        return $this->belongsTo('App\Models\User', 'inviter_id');
    }

}