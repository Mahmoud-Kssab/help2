<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model 
{

    protected $table = 'requests';
    public $timestamps = true;
    protected $fillable = array('title', 'des', 'price', 'user_id', 'type_id', 'city_id', 'latitude', 'longitude');

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

}