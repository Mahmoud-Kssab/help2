<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddTag extends Model
{

    protected $table = 'add_tag';
    public $timestamps = true;
    protected $fillable = array('add_id', 'tag_id');

}
