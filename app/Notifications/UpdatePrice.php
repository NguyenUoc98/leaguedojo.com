<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class UpdatePrice extends Notification implements ShouldQueue
{
    use Queueable;
    public $studentName;
    public $dojoName;
    public $priceOld;
    public $priceNew;
    public $change;
    public $monthStart;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($studentName, $dojoName, $priceNew, $priceOld, $change, $monthStart)
    {
        $this->studentName = $studentName;
        $this->dojoName = $dojoName;
        $this->priceNew = $priceNew;
        $this->priceOld = $priceOld;
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
            ->subject(Lang::get('Thông báo cập nhật học phí'))
            ->greeting('Xin chào ' . $this->studentName . '!')
            ->line(Lang::get('Do sự thay đổi về cơ sở vật chất, dụng cụ tập luyện, chất lượng giảng dạy cũng như để phù hợp hơn với điều kiện hiện tại.'))
            ->line(Lang::get('Ban quản lý cơ sở ' . $this->dojoName . ' đã quyết định thay đổi mức học phí từ ' . number_format($this->priceOld, 0, '', '.') . 'VNĐ/tháng thành ' . number_format($this->priceNew, 0, '', '.') . 'VNĐ/tháng.'))
            ->line(Lang::get('Mức học phí mới sẽ được áp dụng từ tháng ' . $this->monthStart));

        if (!is_null($this->change)) {
            foreach ($this->change as $line) {
                $mailMessage->line($line);
            }
        }

        return $mailMessage->line('Hi vọng bạn sẽ cập nhật được thông tin này cho lần nộp học phí sau!');
    }
}
