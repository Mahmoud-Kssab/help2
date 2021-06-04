<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model 
{

    protected $table = 'category_user';
    public $timestamps = true;
    protected $fillable = array('category_id', 'user_id');

}