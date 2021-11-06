<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notification() {
        return auth()->user()->unreadNotifications;
    }

    public function read(Request $request) {
        auth()->user()->unreadNotifications->find($request->id)->markasRead();
    }

    public function readAll() {
        auth()->user()->unreadNotifications->markasRead();
        return back();
    }
}
