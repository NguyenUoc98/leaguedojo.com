<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ConfirmBookRoom extends Notification implements ShouldQueue
{
    use Queueable;
    public $studentName;
    public $roomName;
    public $roomAddress;
    public $start;
    public $end;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName, $roomName, $roomAddress, $start, $end)
    {
        $this->studentName = $studentName;
        $this->roomName = $roomName;
        $this->roomAddress = $roomAddress;
        $this->start = $start;
        $this->end = $end;
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
            ->subject(Lang::get('Thông báo xác nhận đặt phòng tập luyện'))
            ->greeting('Xin chào ' . $this->studentName . '!')
            ->line(Lang::get('Phòng ' . $this->roomName . ' tại ' . $this->roomAddress . ' mà bạn đặt từ ' . $this->start . ' đến ' . $this->end . ' đã được chập nhận.'))
            ->line(Lang::get('Bạn lưu ý đến đúng giờ và tuân thủ các quy tắc của phòng tập!'));
    }
}
