<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'SKU',
        'name',
        'description',
        'small_description',
        'price',
        'discount',
        'quantity',
        'thumbnail'
    ];

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(\App\Models\Order::class)->withPivot('quantity','price');
    }

    public function image()
    {
        return $this->morphMany(\App\Models\Image::class, 'imageadle');
    }
}
