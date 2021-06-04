<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    protected $table = 'educations';
    public $timestamps = true;
    protected $fillable = array('name','user_id','des');

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }

    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }


}
