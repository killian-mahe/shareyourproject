<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user that wrote the post.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'author_id');
    }

    /**
     * Get the user that wrote the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'author_id');
    }

    /**
     * Get the user that wrote the post.
     */
    public function owned_project()
    {
        return $this->hasMany('App\Models\Project', 'owner_id');
    }
}
