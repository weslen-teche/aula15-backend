<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title', 'description'];

    // Mutators
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    // Relationship
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
