<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;


class Author extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this-> hasMany(Post::class);
    }

    public function scopeName(Builder $query, string $name): Builder
    {
        return $query->where('name', 'LIKE', '%' . $name . '%');
    }
}
