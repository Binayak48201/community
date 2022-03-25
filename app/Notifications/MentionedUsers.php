<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class MentionedUsers extends Notification
{
    public $user;

    public $post;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $post)
    {
        $this->user = $user;
        $this->post = $post;
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
            'test' => 'Her is the message.'
        ];
    }
}
