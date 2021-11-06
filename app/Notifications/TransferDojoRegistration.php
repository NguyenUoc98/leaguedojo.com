<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class TransferDojoRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    public $transferDojo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transferDojo)
    {
        $this->transferDojo = $transferDojo;
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
        return (new MailMessage)
            ->subject(Lang::get('Đơn xin chuyển cơ sở tập luyện'))
            ->line(Lang::get('Bạn vừa nhận được một đơn xin chuyển cở sở tập luyện mới:'))
            ->line(Lang::get('Võ sinh: '. $this->transferDojo->student->name))
            ->line(Lang::get('Từ sơ sở ' . $this->transferDojo->currentDojo->name . ' sang sơ sở ' . $this->transferDojo->newDojo->name))
            ->line('Kiểm tra tại: ' . route('voyager.transfer-dojos.show', $this->transferDojo->id));
    }
}
