<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    /**
     * The roles that belongs to the permission
     */
    public function roles()
    {
        return $this->reblongsToMany('App\Model\Role');
    }
}
