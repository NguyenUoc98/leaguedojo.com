<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PayTuitionOnline extends Notification implements ShouldQueue
{
    use Queueable;
    protected $tuition;
    protected $name;
    protected $student_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tuition, $name, $student_id)
    {
        $this->tuition = $tuition;
        $this->name = $name;
        $this->student_id = $student_id;
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
            ->subject('Thông báo nộp học phí')
            ->line('Võ sinh ' . $this->name . '(' . $this->student_id . ') vừa thanh toán học phí từ tháng ' . Carbon::parse($this->tuition->month_start)->format('m/Y') . ' đến ' .  Carbon::parse($this->tuition->month_end)->format('m/Y') . ' bằng hình thức thanh toán online.')
            ->line('Mã giao dịch: ' . $this->tuition->trans_id)
            ->line('Nội dung: ');

        foreach ($lines as $line) {
            $mailMessage->line($line);
        }

        return $mailMessage;
    }
}
