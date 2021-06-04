<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Media extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     */

    protected $table = 'medias';
    protected $fillable = array( 'url', 'mediaable_id', 'mediaable_type');


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];





    public function mediaable()
    {
        return $this->morphTo();
    }

}
