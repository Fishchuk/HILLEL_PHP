<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['id','path','imageable_id', 'imageable_type'];
    protected $hidden = ['imageable_id', 'imageable_type'];
    public $timestamps = false;
    public function imageable()
    {
        return $this->morphTo();
    }
    public function products()
    {
        return $this->morphToMany(\App\Models\Product::class, 'imageable');
    }
    public function categories()
    {
        return $this->morphToMany(\App\Models\Category::class, 'imageable');
    }
}
