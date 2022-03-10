<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class PostWasUpdate extends Notification
{
    protected $post;
    protected $reply;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($post, $reply)
    {
        $this->post = $post;
        $this->reply = $reply;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->reply->user->name . ' replied to ' . $this->post->title,
            'link' => $this->reply->path()
        ];
    }
}
