<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class RejectTransferDojo extends Notification implements ShouldQueue
{
    use Queueable;
    public $studentName;
    public $reason;
    public $currentDojo;
    public $newDojo;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName, $currentDojo, $newDojo, $reason)
    {
        $this->studentName = $studentName;
        $this->reason = $reason;
        $this->currentDojo = $currentDojo;
        $this->newDojo = $newDojo;
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
            ->subject(Lang::get('Thông báo xác nhận chuyển cơ sở tập luyện'))
            ->greeting('Xin chào ' . $this->studentName . '!')
            ->line(Lang::get('Chúng tôi đã nhận được đề nghị chuyển cở sở tập luyện của bạn từ sơ sở ' . $this->currentDojo . ' sang sơ sở ' . $this->newDojo))
            ->line(Lang::get('Tuy nhiên, chúng tôi rất tiếc khi đề nghị của bạn đã không được chấp nhận.'))
            ->line(Lang::get('Lý do: '))
            ->line(Lang::get($this->reason))
            ->line(Lang::get('Rất mong bạn thông cảm và quay lại vào một dịp khác!'));
    }
}
