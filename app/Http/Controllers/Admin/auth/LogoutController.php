<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        // logout
        Auth::logout();
        // destroy / unset sessions
        request()->session()->invalidate();
        // redirect
        return redirect()->route('index');

    }
}
