<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddCategory extends Model
{

    protected $table = 'add_category';
    public $timestamps = true;
    protected $fillable = array('add_id', 'category_id');

}
