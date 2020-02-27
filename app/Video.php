<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Author;
use App\Genre;

class Video extends Model
{
    public function author()
    {
        return $this->belongsTo(Author::class);
        // return $this->belongsTo('App\Author'); instead of the above, you can use this alone (not with use App\Author at the top)
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
