<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'gender_movie',
        'image',
        'image_type'
    ];

    public function users_renting()
    {
        return $this->belongsToMany(User::class, 'rent_movie_user_link', 'movie_id', 'user_id');
    }

    public function users_previously_rented()
    {
        return $this->belongsToMany(User::class, 'past_rent_movie_user_link', 'movie_id', 'user_id');
    }
}

