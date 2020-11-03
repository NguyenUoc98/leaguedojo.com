<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student;

    /**
     * Create a new controller instance.
     *
     * @param  $student
     * @return void
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StudentRequest  $request
     * @param  Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        // Update Image Card
        if ($request->action == 'image') {
            $data = $request->image;

            if ($student->image != 'students/default.png') {
                File::delete(public_path('/storage/' . $student->image));
            }

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);

            $imageName = time() . '.png';
            $path = public_path() . '/storage/students/' . Carbon::now('Asia/Ho_Chi_Minh')->format('FY');
            File::isDirectory($path) or File::makeDirectory($path);
            file_put_contents($path . '/' . $imageName, $data);

            $student->update([
                'image' => 'students/' . Carbon::now('Asia/Ho_Chi_Minh')->format('FY') . '/' . $imageName,
            ]);
        };

        // Update Information
        if ($request->action == 'edit') {
            $student->update($request->all());
            $student->update([
                'birthday' => Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d'),
            ]);
        };
        $user = auth()->user();
        return view('pages.profile._show', compact('user', 'student'));
    }

    
}
