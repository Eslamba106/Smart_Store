<?php

namespace App\Http\Controllers\front\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage(Request $request){
        return view('front.auth.login');
    }
    public function login(LoginRequest $request){
        // dd($request);
        if(auth()->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
            // $user = [
            //     'email'=> $request->input('email'),
            //     'password'=> bcrypt($request->input('password')),
            // ];
            // Auth::login($user);
            return redirect()->route('home');
        };
        if(auth()->attempt(['user_name'=>$request->input('email') , 'password'=>$request->input('password')])){
            // $user = [
            //     'user_name'=> $request->input('email'),
            //     'password'=> bcrypt($request->input('password')),
            // ];
            // Auth::login($user);
            return redirect()->route('home');
        };
        
        // return redirect()->route('login-page');
        return back()->withErrors([
            'loginError' => 'خطأ في البريد الالكتروني او كلمة المرور . من فضلك حاول مرة اخري',
        ]);
    }
}
