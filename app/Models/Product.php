<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    function image()
    {
        return $this->morphOne(Image::class, 'imageable')->where('type', 'main');
    }

    function gallery()
    {
        return $this->morphMany(Image::class, 'imageable')->where('type', 'gallery');
    }

    function reviews()
    {
        return $this->hasMany(Review::class)->withDefault();
    }

    function carts()
    {
        return $this->hasMany(Cart::class)->withDefault();
    }


    function order_items()
    {
        return $this->hasMany(OrderItems::class)->withDefault();
    }
}
