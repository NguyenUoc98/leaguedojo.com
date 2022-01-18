<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @param  $student
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        // Update Name and Email
        if ($request->type == 'edit') {
            $user->update([
                'name'  => $request->name,
                'email' => $request->email,
            ]);
            $student = $user->student;
            return view('pages.profile._show', compact('user', 'student'));
        };

        // Update Avatar
        if ($request->type == 'avatar') {
            $data = $request->avatar;

            if ($user->avatar != 'users/default.png') {
                File::delete(public_path('/storage/' . $user->avatar));
            }

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $data = base64_decode($data);

            $imageName = time() . '.png';
            $path      = public_path() . '/storage/users/' . Carbon::now('Asia/Ho_Chi_Minh')->format('FY');
            File::isDirectory($path) or File::makeDirectory($path);
            file_put_contents($path . '/' . $imageName, $data);

            $user->update([
                'avatar' => 'users/' . Carbon::now('Asia/Ho_Chi_Minh')->format('FY') . '/' . $imageName,
            ]);
            $student = $user->student;
            return view('pages.profile._show', compact('user', 'student'));
        };

        // Update Password
        if ($request->type == 'reset') {
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'error' => 'Có vẻ như mật khẩu cũ bạn nhập không chính xác',
                ]);
            } else {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return response('success');
            }
        }
    }
}
