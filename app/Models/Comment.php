<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // The post that belong to the comment.
    public function post(){
        return $this->belongsTo(Post::class);
    }

}
