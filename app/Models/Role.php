<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * Get the project that own this role
     */
    public function project()
    {
        return $this->belongsTo('App\Model\Project');
    }

    /**
     * The user that belongs to the role
     */
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
