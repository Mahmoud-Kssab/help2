<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    protected $table = 'works';
    public $timestamps = true;
    protected $fillable = array('title', 'des', 'user_id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

   
}
