<?php

namespace App\Models;

use App\Traits\Trans;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Trans;

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

    function getImgPathAttribute()
    {
        return asset('images/' . $this->image->path);
    }
}
