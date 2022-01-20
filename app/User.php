<?php

namespace App;

use App\Models\Coach;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Models\User as Model;
use App\Models\Student;
use Laravelista\Comments\Commenter;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;

class User extends Model implements MustVerifyEmail
{
    use Notifiable, Commenter;
    use \HighIdeas\UsersOnline\Traits\UsersOnlineTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'student_id',
        'facebook_id',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student()
    {
        return $this->belongsTo(Student::class)->withDefault();
    }

    /**
     * Check User is a student
     *
     * @return boolean
     */
    public function isStudent()
    {
        return (empty($this->student->getAttributes()) || ($this->student->status == 'WAITING_CONFIRM')) ? false : true;
    }

    public function coach(): HasOne
    {
        return $this->hasOne(Coach::class, 'user_id', 'id');
    }

    public function isCoach(): bool
    {
        return !empty($this->coach->getAttributes());
    }
}
