<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title', 'description'];

    // Relationship
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
