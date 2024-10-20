<?php

namespace App\Notifications;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNotification extends Notification
{
    use Queueable;


    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function via(object $notifiable): array
    {
        // return ['mail'];
        return ['database'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toArray(object $notifiable): array
    {
        return [
            'post' => $this->post->id,
            'name' => $this->post->name,
            'body' => $this->post->body,
            'time' => Carbon::now()->diffForHumans(),
        ];
    }
}
