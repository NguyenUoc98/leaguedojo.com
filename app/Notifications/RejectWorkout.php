<?php

namespace App\Notifications;

use App\Models\Dojo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RejectWorkout extends Notification implements ShouldQueue
{
    use Queueable;

    protected $workoutRegistration;
    protected $reason;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($workoutRegistration, $reason)
    {
        $this->workoutRegistration = $workoutRegistration;
        $this->reason              = $reason;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Thông báo xác nhận đăng ký tập luyện.')
            ->greeting('Xin chào ' . $this->workoutRegistration->name . '!')
            ->line('Chúng tôi đã nhận được đăng ký tập luyện tại cơ sở ' . Dojo::find($this->workoutRegistration->dojo_id)->name . ' của bạn.')
            ->line('Chúng tôi rất tiếc khi phải thông báo rằng đơn đăng ký của bạn đã không được chấp nhận!')
            ->line('Lý do: ' . $this->reason)
            ->line('Rất mong bạn thông cảm và hẹn gặp bạn vào một dịp khác')
            ->line('Hân hạnh được phục vụ bạn!');
    }
}
