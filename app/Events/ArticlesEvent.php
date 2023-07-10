<?php

namespace App\Events;

use App\Article;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ArticlesEvent
{
    use InteractsWithSockets, SerializesModels;

    public $article;
    public $action;

    /**
     * Create a new event instance.
     *
     * @param Article $article
     * @param string $action
     */
    public function __construct(\App\Article $article, string $action = 'created')
    {
        $this->article = $article;
        $this->action = $action;
    }
}