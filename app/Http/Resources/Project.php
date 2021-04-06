<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Project extends JsonResource
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
            'description' => $this->description,
            'formated_descripton' => $this->formatedDescription,
            'name' => $this->name,
            'public' => $this->is_public,
            'owner_id' => $this->owner_id,
            'url' => [
                // 'index' => route('projects.show', ['project'=>$this->id]),
                // 'members' => route('projects.members', ['project'=>$this->id]),
                // 'description' => route('projects.about', ['project'=>$this->id]),
            ],
            'technologies' => $this->technologies,
            'member_ids' => $this->members->pluck('id'),
            'profile_picture' => $this->profile_picture(),
            'banner_picture' => $this->banner_picture(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
