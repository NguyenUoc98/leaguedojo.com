<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\HappyBirthday as HappyBirthdayNoti;

class HappyBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tựu động kiểm tra và gửi email chúc mừng sinh nhật tới các user trong hệ thống';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $students = Student::all();
        foreach ($students as $student) {
            if (Carbon::createFromFormat('Y-m-d', $student->birthday, 'Asia/Ho_Chi_Minh')->isBirthday()) {
                echo 'sending to ' . $student->name . "...\n";
                Notification::send($student->user, new HappyBirthdayNoti($student->name));
            }
        }
    }
}
