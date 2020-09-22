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
            'name' => $this->name,
            'public' => $this->is_public,
            'owner_id' => $this->owner_id,
            'url' => [
                'index' => route('projects.show', ['project'=>$this->id]),
                'members' => route('projects.members', ['project'=>$this->id]),
                'description' => route('projects.about', ['project'=>$this->id]),
            ],
            'technologies' => $this->technologies,
            'members_ids' => $this->members->pluck('id'),
            'picture' => asset('vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg'),
            'created_ad' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
