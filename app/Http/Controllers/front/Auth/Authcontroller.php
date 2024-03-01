<?php

namespace App\Http\Controllers\front\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(Request $request){
        return "HOME";
    }
}
