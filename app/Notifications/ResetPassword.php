<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class ResetPassword extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage)
        ->subject(Lang::get('Thông báo đặt lại mật khẩu'))
        ->line(Lang::get('Chúng tôi đã nhận được yêu cầu đặt lại mật khẩu của bạn trên trang ' . config('app.name') . '.'))
        ->line(Lang::get('Click vào "Đặt lại mật khẩu" để thực hiện cập nhật lại mật khẩu của bạn:'))
        ->action(Lang::get('Đặt lại mất khẩu'), url(config('app.url').route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false)))
        ->line(Lang::get('Lưu ý: Liên kết này sẽ hết hạn trong vòng :count phút.', ['count' => config('auth.passwords.users.expire')]))
        ->line(Lang::get('Nếu bạn không yêu cầu đặt lại mật khẩu, bạn có thể bỏ qua tin nhắn này.'));
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     *
     * @param  \Closure  $callback
     * @return void
     */
    public static function toMailUsing($callback)
    {
        static::$toMailCallback = $callback;
    }
}
