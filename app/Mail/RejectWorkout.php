<?php

namespace App\Mail;

use App\Models\Dojo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Queue\SerializesModels;

class RejectWorkout extends Mailable
{
    use Queueable, SerializesModels;

    protected $workoutRegistration;
    protected $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($workoutRegistration, $reason)
    {
        $this->workoutRegistration = $workoutRegistration;
        $this->reason              = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Thông báo xác nhận đăng ký tập luyện.')
            ->html(
                (new MailMessage)
                    ->error()
                    ->greeting('Xin chào ' . $this->workoutRegistration->name . '!')
                    ->line('Chúng tôi đã nhận được đăng ký tập luyện tại cơ sở ' . Dojo::find($this->workoutRegistration->dojo_id)->name . ' của bạn.')
                    ->line('Chúng tôi rất tiếc khi phải thông báo rằng đơn đăng ký của bạn đã không được chấp nhận!')
                    ->line('Lý do: ' . $this->reason)
                    ->line('Rất mong bạn thông cảm và hẹn gặp bạn vào một dịp khác')
                    ->line('Hân hạnh được phục vụ bạn!')->render()
            );
    }
}
