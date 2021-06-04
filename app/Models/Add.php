<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Add extends Model 
{

    protected $table = 'Adds';
    public $timestamps = false;
    protected $fillable = array('title', 'des', 'user_id', 'seo_title', 'seo_des', 'seo_keywords', 'created_at',  'activate' );

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function offers()
    {
        return $this->hasMany('App\Models\Offer');
    }
    public function types()
    {
        return $this->hasMany('App\Models\Type');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_work', 'category_id', 'work_id');
        // return $this->belongsToMany(Category::class, 'product_has_category', 'product_id', 'category_id');
    }

    public function media()
    {
        return $this->morphOne('App\Models\Media', 'mediaable');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}