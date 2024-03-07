<?php

namespace App\Http\Controllers\admin\Auth;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{

    public function registerPage(){
        return view('Admin.auth.register');
    }
    public function register(RegisterRequest $request){

        // $data = $request->except('image');
        // dd($request);
        // dd($request->image);
        if ($request->hasFile('image')) {
            $image = uploadImage($request , 'admin_profile_images');
        }
       $user =  Admin::create([
           'email'=> $request->email . '.admin',
           'user_name'=> $request->username ?? null,
           'image'=> $image,
           'password'=> bcrypt($request->password),
            'name'=> $request->name,
        ]);
        auth()->guard('admin')->attempt(['user_name'=>$request->input('username') , 'password'=>$request->input('password')]);
        return redirect()->route('admin.dashboard');
    // return "Ok";
    }

    public function loginPage(Request $request){
        return view("admin.auth.login");
    }

    public function login(LoginRequest $request){
        if(auth()->guard('admin')->attempt(['email'=>$request->input('email') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        };
        if(auth()->guard('admin')->attempt(['user_name'=>$request->input('email') , 'password'=>$request->input('password')])){
            return redirect()->route('admin.dashboard');
        };
        
        // return redirect()->route('login-page');
        return back()->withErrors([
            'loginError' => 'خطأ في البريد الالكتروني او كلمة المرور . من فضلك حاول مرة اخري',
        ]);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('admin.login-page');
    }
}
