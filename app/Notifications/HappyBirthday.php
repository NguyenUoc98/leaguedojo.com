<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class HappyBirthday extends Notification implements ShouldQueue
{
    use Queueable;

    protected $studentName;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName)
    {
        $this->studentName = $studentName;
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
            ->subject(Lang::get('Thư chúc mừng sinh nhật'))
            ->greeting('Chúc mừng sinh nhật ' . $this->studentName . '!')
            ->line(Lang::get('Ngày hôm nay ' . \Carbon\Carbon::now()->format('d/m/Y') . ' là một ngày thật tuyệt vời! Chúng tôi - Đội ngũ Admin website Karate League Dojo
            thay mặt cho võ đường xin chân thành cảm ơn bạn đã đồng hành cùng chúng tôi trong suốt quãng đường vừa qua.
            Chúc bạn sẽ có một tuổi mới với nhiều tiếng cười, hạnh phúc và sức khỏe tốt.
            Hy vọng chúng ta có thể đồng hành cùng nhau lâu nhất có thể nhé! Chúc mừng sinh nhật!'));
    }
}
