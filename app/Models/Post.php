<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The name of the database.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'is_public'];

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
        return $this->belongsTo('App\Model\Project');
    }

    /**
     * Get all of the tags for the project.
     */
    public function tags()
    {
        return $this->morphToMany('App\Model\Tag', 'taggable');
    }
}
