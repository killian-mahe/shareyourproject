<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

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
    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = Project::STATUS[$value];
    }

    /**
     * Get the HTML formated project description
     * @param string $value
     * @return string
     */
    public function getFormatedDescriptionAttribute()
    {
        return nl2br($this->description);
    }

    /**
     * Get project picture
     */
    public function profile_picture()
    {
        if ($this->profile_picture) {
            return $this->profile_picture;
        } else {
            return asset('vendor/courier/img/default_project_picture.jpg');
        }
    }

    /**
     * Get project banner
     */
    public function banner_picture()
    {
        if ($this->banner_picture) {
            return $this->banner_picture;
        } else {
            return asset('vendor/courier/img/default_project_banner.jpg');
        }
    }

    /**
     * Get the roles of the project
     */
    public function roles()
    {
        return $this->hasMany('App\Models\Role');
    }

    /**
     * Get the followers of the project
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'project_follows', 'project_id', 'follower_id');
    }
}
