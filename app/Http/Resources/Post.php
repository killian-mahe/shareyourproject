<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use \App\Http\Resources\Project as ProjectResource;
use \App\Http\Resources\User as UserResource;
use \App\Http\Resources\Comment as CommentResource;
use Illuminate\Support\Facades\Storage;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $images_url = [];
        foreach ($this->images as $image) {
            $images_url[] = Storage::url($image->url);
        }

        return [
            'id' => $this->id,
            'content' => $this->content,
            'formated_content' => $this->formatedContent,
            'author' => new UserResource($this->author),
            'project' => new ProjectResource($this->project),
            'images_url' => $images_url,
            'url' => [
                'author' => route('users.show', ['user'=>$this->author_id]),
                'post' => route('posts.show', ['post'=>$this->id])
            ],
            'reshared_post' => $this->shared_post_id ? new Post(\App\Models\Post::where('id', $this->shared_post_id)->first()) : false,
            'liked' => Auth::user() ? Auth::user()->does_it_like($this->resource) : false,
            'comments_overview' => CommentResource::collection($this->comments()->latest()->take(2)),
            'comments_ids' => $this->comments->pluck('id'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
