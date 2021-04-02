<?php

namespace App\Models;

use App\User;
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

    /**
     * Get the comments of the post.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    /**
     * Get the HTML formated project description
     * @param string $value
     * @return string
     */
    public function getFormatedContentAttribute()
    {
        return nl2br($this->content);
    }

    /**
     * Get the images that belongs to the post
     */
    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    /**
     * Get the videos that belongs to the post
     */
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    /**
     * Reshare a post
     */
    public function reshare_post(int $id)
    {
        $this->shared_post_id = $id;
    }

    /**
     * Like the post
     * @param \App\User $user
     */
    public function like(User $user)
    {
        $user->liked_posts()->attach($this);
    }

    /**
     * Unlike the post
     * @param \App\User $user
     */
    public function unlike(User $user)
    {
        $user->liked_posts()->detach($this);
    }
}
