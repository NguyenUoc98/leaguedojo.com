<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ConfirmTransferDojo extends Notification implements ShouldQueue
{
    use Queueable;
    public $studentName;
    public $currentDojo;
    public $newDojo;
    public $change;
    public $monthStart;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName, $currentDojo, $newDojo, $change, $monthStart)
    {
        $this->studentName = $studentName;
        $this->currentDojo = $currentDojo;
        $this->newDojo = $newDojo;
        $this->change = $change;
        $this->monthStart = $monthStart;
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
        $mailMessage = (new MailMessage)
            ->subject(Lang::get('Thông báo xác nhận chuyển cơ sở tập luyện'))
            ->greeting('Xin chào ' . $this->studentName . '!')
            ->line(Lang::get('Chúng tôi đã nhận được đề nghị chuyển cở sở tập luyện của bạn từ sơ sở ' . $this->currentDojo . ' sang sơ sở ' . $this->newDojo))
            ->line(Lang::get('Bằng email này chúng tôi xác nhận đơn xin chuyển cơ sở tập luyện của bạn đã được chấp nhận và bạn sẽ chuyển sang cơ sở mới để tiếp tục tập luyện từ tháng ' . $this->monthStart));

        if (!is_null($this->change)) {
            $mailMessage->line(Lang::get('Do mức học phí tại cơ sở ' . $this->currentDojo . ' và mức học phí tại cơ sở ' . $this->newDojo . ' có sự khác nhau nên:'));
            foreach ($this->change as $line) {
                $mailMessage->line($line);
            }
        }

        return $mailMessage->line('Hi vọng bạn sẽ cập nhật được thông tin này cho lần nộp học phí sau!');
    }
}
