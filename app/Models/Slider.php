<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model 
{

    protected $table = 'sliders';
    public $timestamps = true;
    
    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }

}