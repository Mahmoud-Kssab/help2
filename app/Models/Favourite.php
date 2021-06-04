<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model 
{

    protected $table = 'favourites';
    public $timestamps = true;
    protected $fillable = array('name','add_id','user_id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function add()
    
    {
        return $this->belongsTo('App\Models\Add');
    }

}