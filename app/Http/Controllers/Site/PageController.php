<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Dojo;
use App\Models\Event;
use App\Models\Post;
use App\Models\Slide;
use App\Models\Video;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Facades\Voyager;

class PageController extends Controller
{
    protected $post;
    protected $video;
    protected $student;
    protected $achievement;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Post $post, Video $video, Student $student)
    {
        $this->post    = $post;
        $this->video   = $video;
        $this->student = $student;
    }

    /**
     * Return view NEWS
     */
    public function news()
    {
        $slides       = Slide::all();
        $dojos        = Dojo::all();
        $mostViewed   = $this->post->mostViewed();
        $orderVideos  = $this->video->orderByView(true);
        $mostFeatured = $this->post->mostFeatured();
        $latestPost   = $this->post->latestPost();

        // SEO
        $meta_desc     = 'Hệ thống đào tạo và phát triển Karate chất lượng Hà Nội';
        $meta_keywords = 'karate, học võ hà nội, hà nội, karate league dojo, học võ tốt nhất hà nội, tin tức karate';
        $url_canonical = route('news');
        $image_og      = Voyager::image($slides[0]->image);
        $meta_title    = 'Tin tức';
        // SEO

        return view(
            'pages.news.index',
            compact(
                'slides',
                'dojos',
                'mostViewed',
                'orderVideos',
                'mostFeatured',
                'latestPost',
                'meta_desc',
                'meta_keywords',
                'url_canonical',
                'image_og',
                'meta_title'
            )
        );
    }

    /**
     * Return view Profile
     */
    public function profile()
    {
        $user        = auth()->user();
        $student     = $user->student;
        $listStudent = $this->student->rankResults(0);
        $rank        = $listStudent->search(function ($value, $key) use ($student) {
                return $value['student_id'] == $student->id;
            }) + 1;
        $total       = count($listStudent);

        // Lấy tất cả huy chương
        $achievements = $student->achievements()->select(DB::raw('*,YEAR(date) as year'))->orderByDesc('year')->get()->groupBy('year');
        $totalMedals  = collect($achievements)->map(function ($value, $key) {
            return collect($value)->map(function ($vl) {
                return $vl['medal'];
            });
        })->map(function ($achievement) {
            return array_count_values($achievement->toArray());
        });

        // Lấy tất cả điểm thi
        $testScores = $student->testScores()->get();

        // Lấy tất cả sự kiện đã tham gia
        $event_confirmed = $student->events()->wherePivot('confirmed', 'CONFIRMED')->withPivot('image', 'note')->orderByDesc('date')->paginate(setting('app.event_profile'));

        // Điểm rèn luyện
        $pointTraining = $student->getPointTraining();

        // SEO
        $meta_desc     = 'Hệ thống đào tạo và phát triển Karate chất lượng Hà Nội';
        $meta_keywords = '';
        $url_canonical = route('profile');
        $image_og      = '';
        $meta_title    = 'Trang cá nhân';
        // SEO

        return view('pages.profile.index', compact('user', 'student', 'rank', 'total', 'totalMedals', 'achievements', 'testScores', 'event_confirmed', 'pointTraining', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Return view home.
     *
     */
    public function home()
    {
        $students    = $this->student->rankResults();
        $topStudents = $students->take(10);
        $events      = Event::query()
            ->where('view_home_page', true)
            ->orderByDesc('date')
            ->get()
            ->groupBy(function ($value) {
                return $value->date->year;
            })->sortKeysDesc();

        // SEO
        $meta_desc     = 'Hệ thống đào tạo và phát triển Karate chất lượng Hà Nội';
        $meta_keywords = 'karate, học võ hà nội, hà nội, karate league dojo, học võ tốt nhất hà nội';
        $url_canonical = route('home');
        $image_og      = config('app')['url'] . '/img/home/introduce/i8.jpg';
        $meta_title    = setting('site.title');
        // SEO

        return view('pages.home', compact('topStudents', 'events', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }
}
