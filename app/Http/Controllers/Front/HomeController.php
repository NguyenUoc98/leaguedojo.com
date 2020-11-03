<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class HomeController extends Controller
{
    protected $student;

    /**
     * Create a new controller instance.
     *
     * @param  $post
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = $this->student->rankResults();
        $topStudents = $students->take(3);

        // SEO
        $meta_desc = 'Hệ thống đào tạo và phát triển Karate chất lượng Hà Nội';
        $meta_keywords = 'karate, học võ hà nội, hà nội, karate league dojo, học võ tốt nhất hà nội';
        $url_canonical = route('home');
        $image_og = config('app')['url'] . '/img/home/introduce/i8.jpg';
        $meta_title = setting('site.title');
        // SEO

        return view('pages.home', compact('topStudents', 'students', 'meta_desc', 'meta_keywords', 'url_canonical', 'image_og', 'meta_title'));
    }

    /**
     * Paginate for students
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $students = $this->student->rankResults();
            return view('pages.rank_table', compact('students'))->render();
        }
    }
}
