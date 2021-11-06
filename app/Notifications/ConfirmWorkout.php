<?php

namespace App\Notifications;

use App\Models\Dojo;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class ConfirmWorkout extends Notification implements ShouldQueue
{
    use Queueable;
    protected $workoutRegistration;
    protected $student_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($workoutRegistration, $student_id)
    {
        $this->workoutRegistration = $workoutRegistration;
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
        return (new MailMessage)
            ->subject('Thông báo xác nhận đăng ký tập luyện.')
            ->greeting('Xin chào ' . $this->workoutRegistration->name . '!')
            ->line('Chúng tôi đã nhận được đăng ký tập luyện tại cơ sở ' . Dojo::find($this->workoutRegistration->dojo_id)->name . ' của bạn.')
            ->line('Bằng email này, chúng tôi xin thông báo đơn đăng ký của bạn đã được chấp nhận. Và chúng tôi rất vui mừng khi bạn là một thành viên mới của hệ thống!')
            ->line('Nếu bạn chưa đăng ký tài khoản trước đó, tài khoản truy cập hệ thống của bạn sẽ là: ')
            ->line(new HtmlString('<div style="background-color: #dcdcdc;padding: 15px;width: fit-content;border-radius: 11px;color: #000;border: 1px solid #555;">
                        E-mail: '. $this->workoutRegistration->email .'<br>
                        Password: ' . $this->workoutRegistration->phone . '
                    </div>'))
            ->line('Mã số võ sinh của bạn trên hệ thống là: ' . $this->student_id)
            ->line('Sau đây, hãy truy cập trang cá nhân của mình, kiểm tra các thông tin cá nhân đã đăng ký và chỉnh sửa nếu có sự sai sót.')
            ->action('Trang cá nhân', url(route('profile')))
            ->line('Rất hân hạnh được phục vụ bạn!')
            ->success();
    }
}
