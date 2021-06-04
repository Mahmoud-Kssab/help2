<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $table = 'messages';
    public $timestamps = true;
    protected $fillable = array('content', 'sender_id', 'receiver_id');


    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }


    public function sender()
    {
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    }
}
