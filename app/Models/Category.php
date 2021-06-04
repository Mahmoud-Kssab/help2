<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = array('name', 'parent', 'sub');

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function adds()
    {
        return $this->belongsToMany('App\Models\Add', 'add_category', 'add_id', 'category_id');
    }

    public function parents()
    {
        return $this->belongsToMany('App\Models\Category', 'id', 'parent');
    }
}
