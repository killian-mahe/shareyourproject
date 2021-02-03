<?php

namespace App\Events;

use App\Http\Resources\Post as ResourcesPost;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use App\Models\Post;
use Illuminate\Queue\SerializesModels;

class PostCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * The post instance
     *
     * @var \App\Models\Post
     */
    public $post;

    /**
     * Create a new event instance.
     *
     * @param \App\Models\Post  $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('projects.'.$this->post->project->id);
    }

    /**
     * Get the data to broadcast
     *
     * @return App\Http\Resources\Post
     */
    public function broadcastWith()
    {
        return (new ResourcesPost($this->post))->resolve();
    }
}
