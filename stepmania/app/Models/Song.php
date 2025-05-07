<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = [
        'title',
        'artist',
        'genre',
        'year',
        'cover_image',
        'album_id'
    ];

    public function album ()
    {
        return $this->belongsTo(Album::class);
    }
    
}
