<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusUpdate extends Notification
{
    use Queueable;
    protected $infouser;
//    var challenged;




    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $infouser)
    {
        //
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

        switch ($this->infouser[1]){

            case 0: // challenger
                $challenger = new MailMessage;
                $challenger->subject('New Dewl')
                    ->from('dewlermailtest@gmail.com', 'Dewlers')
                    ->greeting('Lets Dewl!')
                    ->line('You have been invited by '.$this->infouser[0].' to participate  on a Dewl')
                    ->action('Check it out', url('/status'));
                return ($challenger);

                break;

            case 1: //witness

                $witness = new MailMessage;
                $witness->subject('New Dewl')
                    ->from('dewlermailtest@gmail.com', 'Dewlers')
                    ->greeting('Lets Dewl!')
                    ->line('You have been invited by '.$this->infouser[0].' to participate on a Dewl as a witness')
                    ->action('Check it out', url('/witness'));
                return ($witness);


                break;

            case 2: //winner

                $winner = new MailMessage;
                $winner->subject('Dewl Win')
                    ->from('dewlermailtest@gmail.com', 'Dewlers')
                    ->greeting('Congratulations!')
                    ->line('You are the winner of the Dewl '.$this->infouser[0].'! The stacks you won are already on your account.') // infouser[0] debe ser el nombre del dewl
                    ->action('Check it out', url('/dashboard'))
                    ->line('Continue Dewling!');

//                    ->action('Check it out', url('/dashboard'));
                return ($winner);


                break;

            case 3: //loser

                $loser = new MailMessage;
                $loser->subject('Dewl loss')
                    ->from('dewlermailtest@gmail.com', 'Dewlers')
                    ->greeting('Better luck next time!')
                    ->line('You have lost against'.$this->infouser[3].' the Dewl'.$this->infouser[0])  // infouser[0] debe ser el nombre del dewl, infouser[3] debe ser el nombre del oponente
                    ->action('Check it out', url('/dashboard'))
                    ->line('Continue Dewling!');
                return ($loser);

                break;

            case 4:

                $double_or_noting=new MailMessage;
                $double_or_noting->subject('Dewl double or nothing')
                    ->from('dewlermailtest@gmail.com', 'Dewlers')
                    ->greeting('Lets Dewl!')
                    ->line('You have been invited by '.$this->infouser[0].' to participate on a Dewl double or nothing.')
                    ->action('Check it out', url('/dashboard'));
                return ($double_or_noting);
                break;
        }

//        if ($this->infouser[1]==0){
//            $challenger = new MailMessage;
//        $challenger->subject('New Dewl')
//            ->from('dewlermailtest@gmail.com', 'Dewlers')
//            ->greeting('Lets Dewl!')
//            ->line('You have been invited by '.$this->infouser[0].' to participate  on a Dewl')
//            ->action('Check it out', url('/status'))
//            ->line('Good luck do the best!');
//        return ($challenger);
//    }
//        else{
//            $witness = new MailMessage;
//            $witness->subject('New Dewl')
//                ->from('dewlermailtest@gmail.com', 'Dewlers')
//                ->greeting('Lets Dewl!')
//                ->line('You have been invited by '.$this->infouser[0].' to participate on a Dewl as a witness')
//                ->action('Check it out', url('/witness'))
//                ->line('Good luck!');
//            return ($witness);
//        }




//        $witness=new MailMessage;
//        $witness->subject('New Dewl')
//            ->from('dewlermailtest@gmail.com', 'Dewlers')
//            ->greeting('Lets Dewl!')
//            ->line('You has been invited for '.$this->infouser[0].' to be participed on a dewl')
//            ->action('Check it out', url('/status'))
//            ->line('Good luck do the best!');


    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable spell action great nice job great
     * @return array create acount? of course
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
