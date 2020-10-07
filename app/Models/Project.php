<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public const STATUS = [
        'ongoing' => 0,
        'onbreak' => 1,
        'finished' => 2,
        'abandoned' => 3
    ];

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
     * Get the user that owns the project.
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get all of the tags for the project.
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    /**
     * Get all of the technologies for the project.
     */
    public function technologies()
    {
        return $this->morphToMany('App\Models\Technology', 'technologisable');
    }

    /**
     * Get all of the posts for the project.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the members of the project.
     */
    public function members()
    {
        return $this->belongsToMany('App\User', 'project_user', 'project_id', 'user_id');
    }

    /**
     * Get the project status.
     *
     * @param integer $value
     * @return string
     */
    public function getStatusAttribute($value)
    {
        return array_search($value, Project::STATUS);
    }

    /**
     * Set the project status.
     *
     * @param  string  $value
     * @return void
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['status'] = Project::STATUS[$value];
    }
}
