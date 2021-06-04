<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commision extends Model 
{

    protected $table = 'commissions';
    public $timestamps = true;
    protected $fillable = array('name', 'freelance_id','price','client_id');

    public function freelance()
    {
        return $this->belongsTo('App\Models\User', 'freelance_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\User', 'client_id');
    }
}