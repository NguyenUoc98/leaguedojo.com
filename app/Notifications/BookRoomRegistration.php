<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class BookRoomRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    protected $bookRoom;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($bookRoom)
    {
        $this->bookRoom = $bookRoom;
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
        $studentName = $this->bookRoom->student->name;
        $room = $this->bookRoom->room->name;
        return (new MailMessage)
            ->subject(Lang::get('Đăng ký mượn phòng mới'))
            ->line(Lang::get('Có một lịch mượn phòng mới cần bạn xác nhận từ:'))
            ->line(Lang::get('Võ sinh: '. $studentName))
            ->line(Lang::get('Phòng: ' . $room))
            ->line(Lang::get('Ngày: ' . $this->bookRoom->date))
            ->line(Lang::get('Từ: ' . $this->bookRoom->start_at . ' đến ' . $this->bookRoom->end_at))
            ->line('Kiểm tra tại: ' . route('voyager.book-rooms.show', $this->bookRoom->id));
    }
}
