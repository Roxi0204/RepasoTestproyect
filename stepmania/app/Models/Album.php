<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=[
        'title',
        'artist',
        'genre',
        'year',
    ];
    public function songs ()
    {
        return $this->hasMany(Song::class);
    }
    public function artists()
    {
        return $this->belongsToMany(Artist::class,'artist_albums');
    }
}
