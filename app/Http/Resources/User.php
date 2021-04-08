<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Project;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'title' => $this->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'full_name' => $this->fullname,
            'url' => [
                // 'index' => route('users.show', ['user'=>$this->id]),
                // 'settings' => route('users.settings.profile', ['user'=>$this->id])
            ],
            'profile_picture' => $this->profile_picture(),
            'banner_picture' => $this->banner_picture(),
            'owned_projects' => Project::collection($this->owned_project),
            'followed_projects' => $this->followed_projects->pluck('id'),
            'projects' => Project::collection($this->projects)
        ];
    }
}
