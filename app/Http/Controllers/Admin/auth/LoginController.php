<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function loginPage(){
        return view('admin.pages.login.loginpage');
    }

    /**
     * @throws ValidationException
     */
    public function login(){

        $this->validate(\request(),[
            'email' => 'required|email|min:12|max:55',
            'password'=> 'required|min:6|max:30'
        ]);

        // get email/password from request
        $credentials = request()->only('email','password');
        // check in DB throw auth()->attempt($credential)

        if(auth()->attempt($credentials) && \auth()->user()->role == 'admin'){
            return redirect()->route('admin.index');
        }

        $out= new LogoutController();
        $out->logout();
       return redirect()->back()->with(['error'=>'Invalid credentials']);
    }


}
