<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Auth;

class NewUserNotification extends Notification
{
    use Queueable;

    private $newsletter;

    public function __construct($new)
    {
         $this->newsletter = $new;
    }


    public function via($notifiable)
    {
        return ['database'];
    }


    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'url'     =>route('view.News'),
            'category'=>'Newsletter',
            'details' =>'There is a new Newsletter from '.$this->newsletter->email,
        ];
    }
}
