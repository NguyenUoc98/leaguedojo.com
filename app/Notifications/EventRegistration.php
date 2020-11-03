<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class EventRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    protected $attend;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($attend)
    {
        $this->attend = $attend;
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
        $studentName = $this->attend->student->name;
        $event = $this->attend->event->name;

        return (new MailMessage)
            ->subject(Lang::get('Đăng ký xác nhận sự kiện'))
            ->line(Lang::get('Có một đăng ký xác nhận sự kiện cần bạn xác nhận từ:'))
            ->line(Lang::get('Võ sinh: '. $studentName))
            ->line(Lang::get('Sự kiện: ' . $event))
            ->line(Lang::get('Nội dung: ' . $this->attend->note))
            ->line('Kiểm tra tại: ' . route('voyager.attends.show', $this->attend->id));
    }
}
