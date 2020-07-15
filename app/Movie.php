<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = ['name', 'cost', 'release_date', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
