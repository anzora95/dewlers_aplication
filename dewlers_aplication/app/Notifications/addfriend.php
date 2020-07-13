<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class addfriend extends Notification
{
    use Queueable;
    protected $infouser;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $infouser)
    {
        $this->infouser= $infouser;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $friend = new MailMessage;
        $friend->subject('New friend')
            ->from('dewlermailtest@gmail.com', 'Dewlers')
            ->greeting('New friend')
            ->line($this->infouser[0]. ' accept your friend request.')
            ->action('My Account', url('/myaccount'));

        return ($friend);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}