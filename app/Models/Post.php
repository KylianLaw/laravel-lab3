<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeCommenterName(Builder $query, string $name): Builder
    {
        return $query->where('commenter_name', 'LIKE', '%' . $name . '%');
    }
}
