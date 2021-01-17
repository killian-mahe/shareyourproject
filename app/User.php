<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\Project;
use App\Models\Settings;
use App\Models\Post;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'username', 'email', 'password', 'title'
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
     * Get all of the technologies for the user.
     */
    public function technologies()
    {
        return $this->morphToMany('App\Models\Technology', 'technologisable');
    }

    /**
     * Get the user that wrote the post.
     */
    public function owned_project()
    {
        return $this->hasMany('App\Models\Project', 'owner_id');
    }

    /**
     * Get the project where user is member.
     */
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project');
    }

    /**
     * Get the post liked by the user.
     */
    public function liked_posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    /**
     * Get the full-name of the user.
     */
    public function full_name()
    {
        return $this->first_name." ".$this->last_name;
    }

    /**
     * Get the fullname of the user
     */
    public function getFullnameAttribute()
    {
        return $this->full_name();
    }

    /**
     * Get the user profile picture.
     */
    public function profile_picture()
    {
        if ($this->profile_picture) {
            return $this->profile_picture;
        } else {
            return asset('vendor/courier/img/default_profile_picture.jpg');
        }
    }

    /**
     * Get the user profile picture.
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
     * Check if the user likes the post.
     * @return bool
     */
    public function does_it_like(Post $post)
    {
        return $this->liked_posts->contains($post);
    }

    /**
     * The role that belongs to the user
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * If the user as the permission in the project
     * @param String $permission_string
     * @param App\Models\Project $project
     *
     * @return bool
     */
    public function has_permission(String $permission_string, Project $project)
    {
        $roles = $this->roles()->where('project_id', $project->id)->get();

        foreach ($roles as $role) {
            $permissions = json_decode($role->permissions, true);

            if (array_key_exists($permission_string, $permissions) && $permissions[$permission_string]) {
                return true;
            }

        }
        return false;
    }

    /**
     * Get the settings associated with the user.
     */
    public function settings()
    {
        return $this->hasOne(Settings::class);
    }

    /**
     * Get the followed projects of the user
     */
    public function followed_projects()
    {
        return $this->belongsToMany(Project::class, 'project_follows', 'follower_id', 'project_id');
    }
}
