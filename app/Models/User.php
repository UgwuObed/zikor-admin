<?php

namespace App\Models;
use App\Models\Food;
use App\Models\Shoe;
use App\Models\Clothes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'business_name',
        'email',
        'password',
        'phone',
        'state',
        'country',
        'city',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the foods uploaded by the user.
     */
    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    /**
     * Get the shoes uploaded by the user.
     */
    public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }

    /**
     * Get the clothes uploaded by the user.
     */
    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }
}

