<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Video;
use App\Genre;

class Author extends Model
{
    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
