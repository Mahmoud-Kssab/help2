<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('about_us', 'phone', 'email', 'fb_link', 'tw_link', 'youtube_link', 'inst_link', 'whatsapp_link', 'google_plus_link','tax');

}
