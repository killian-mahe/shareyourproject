<?php

namespace App\Policies;

use App\Models\Project;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->email_verified_at != null;
    }

    /**
     * Determine whether the user can create a post on the project.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Project  $project
     * @return mixed
     */
    public function createPost(User $user, Project $project)
    {
        return $user->has_permission('post.create', $project);
    }
}
