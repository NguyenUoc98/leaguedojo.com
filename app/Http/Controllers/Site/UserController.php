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
     * @param UserRequest $request
     * @param User $user
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|void
     */
    public function update(UserRequest $request, User $user)
    {
        // Update Name and Email
        if ($request->type == 'edit') {
            $user->update([
                'name' => $request->name,
            ]);
            return redirect()->back()->with([
                'message' => 'Cập nhật thành công',
                'type'    => 'success',
                'color'   => '#4caf50',
            ]);
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
            return response()->json([
                'message' => 'Update success',
            ]);
        };

        // Update Password
        if ($request->type == 'reset') {
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with([
                    'message' => 'Mật khẩu cũ không chính xác',
                    'type'    => 'error',
                    'color'   => '#ed3939',
                ]);
            } else {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
                return redirect()->back()->with([
                    'message' => 'Cập nhật thành công',
                    'type'    => 'success',
                    'color'   => '#4caf50',
                ]);
            }
        }
    }
}
