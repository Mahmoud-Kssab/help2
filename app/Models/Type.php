<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model 
{

    protected $table = 'types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function requests()
    {
        return $this->hasMany('Request', 'request_id');
    }

}