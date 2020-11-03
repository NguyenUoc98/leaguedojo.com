<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class PayTuition extends Notification implements ShouldQueue
{
    use Queueable;
    public $tuition;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tuition, $name)
    {
        $this->tuition = $tuition;
        $this->name = $name;
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
        $lines = explode("\r\n", $this->tuition->note);
        $mailMessage = (new MailMessage)
            ->subject(Lang::get('Thông báo nộp học phí thành công'))
            ->greeting('Xin chào ' . $this->name . '!')
            ->line(Lang::get('Bạn vừa thanh toán học phí từ tháng ' . Carbon::parse($this->tuition->month_start)->format('m/Y') . ' đến ' .  Carbon::parse($this->tuition->month_end)->format('m/Y')))
            ->line(Lang::get('Người thu: ' . $this->tuition->cashier));

        foreach ($lines as $line) {
            $mailMessage->line($line);
        }

        return $mailMessage;
    }
}
