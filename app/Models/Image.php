<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * Get the post that belongs to the Image
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}
