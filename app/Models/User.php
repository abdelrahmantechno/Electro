<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    function reviews()
    {
        return $this->hasMany(Review::class)->withDefault();
    }

    function carts()
    {
        return $this->hasMany(Cart::class)->withDefault();
    }

    function orders()
    {
        return $this->hasMany(Order::class)->withDefault();
    }

    function order_items()
    {
        return $this->hasMany(OrderItems::class)->withDefault();
    }

    function testimonials()
    {
        return $this->hasMany(Testimonial::class)->withDefault();
    }
}
