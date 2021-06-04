<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryWork extends Model
{

    protected $table = 'category_work';
    public $timestamps = true;
    protected $fillable = array('category_id', 'work_id');

}
