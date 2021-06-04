<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model 
{

    protected $table = 'cites';
    public $timestamps = true;
    protected $fillable = array('name', 'freelance_id','client_id');

    public function governorate()
    {
        return $this->belongsTo('App\Models\Governorate');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function requests()
    {
        return $this->hasMany('App\Models\Request');
    }

}