<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model 
{

    protected $table = 'rates';
    public $timestamps = true;
    protected $fillable = array('quality_rate', 'price_rate', 'personal_rate', 'rater_id', 'rated_id');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}