<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'color',
        'size',
        'brand',
        'gender',
        'price',
        'description',
        'category',
        'image_url1',
        'image_url2',
        'image_url3',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

