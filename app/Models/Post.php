<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The name of the database.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content'];

    /**
     * Get the user that wrote the post.
     */
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the project from where this post was written.
     * This can be NULL.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Get all of the tags for the project.
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * Get users that liked the post.
     */
    public function liking_users()
    {
        return $this->belongsToMany('App\User');
    }
}
