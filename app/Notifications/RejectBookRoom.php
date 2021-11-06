<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RejectBookRoom extends Notification implements ShouldQueue
{
    use Queueable;
    public $studentName;
    public $roomName;
    public $roomAddress;
    public $start;
    public $end;
    public $reason; 

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName, $roomName, $roomAddress, $start, $end, $reason)
    {
        $this->studentName = $studentName;
        $this->roomName = $roomName;
        $this->roomAddress = $roomAddress;
        $this->start = $start;
        $this->end = $end;
        $this->reason = $reason;
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
            ->line(Lang::get('Phòng ' . $this->roomName . ' tại ' . $this->roomAddress . ' mà bạn đặt từ ' . $this->start . ' đến ' . $this->end . ' đã bị từ chối.'))
            ->line(Lang::get('Lý do: '))
            ->line(Lang::get($this->reason))
            ->line(Lang::get('Bạn có thể xem xét đặt khoảng thời gian khác hoặc phòng khác nhé!'))
            ->line(Lang::get('Rất xin lỗi vì không thể phục vụ bạn trong khoảng thời gian này.'));
    }
}
