<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WorkoutRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    protected $workoutRegistration;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($workoutRegistration)
    {
        $this->workoutRegistration = $workoutRegistration;
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
            ->subject('Đăng ký tập luyện mới')
            ->line('Bạn vừa nhận được một đơn đăng ký tập luyện mới:')
            ->line('Họ và tên: ' . $this->workoutRegistration->name)
            ->line('Số điện thoại: ' . $this->workoutRegistration->phone)
            ->line('Link facebook: ' . $this->workoutRegistration->link_fb)
            ->line('Giới tính: ' . $this->workoutRegistration->sex == 0 ? 'Nam' : 'Nữ')
            ->line('Chiều cao: ' . $this->workoutRegistration->height . 'cm')
            ->line('Cân nặng: ' . $this->workoutRegistration->weight . 'kg')
            ->line('Kiểm tra tại: ' . route('voyager.workout-registrations.show', $this->workoutRegistration->id));
    }
}
