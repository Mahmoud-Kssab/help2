<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'min_price', 'max_price','work_id','user_id');

    public function work()
    {
        return $this->belongsTo('App\Models\Work');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
