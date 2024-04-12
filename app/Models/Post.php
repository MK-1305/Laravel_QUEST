<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'about', 'content'];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
