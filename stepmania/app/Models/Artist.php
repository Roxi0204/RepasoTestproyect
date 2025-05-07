<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function albums(){
        return $this->belongsToMany(Album::class,'artist_albums');
    }
}
