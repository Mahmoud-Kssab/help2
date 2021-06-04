<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    /* ************************ ACCESSOR ************************* */
 
    public function adds()
    {
        return $this->belongsToMany('App\Models\Add', 'add_category', 'add_id', 'category_id');
    }

}
