<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // The users that belong to the country.
    public function users(){
        return $this->hasMany(User::class);
    }

    // Get the user's post.
    public function posts(){
        return $this->hasManyThrough(Post::class, User::class);
    }
}
