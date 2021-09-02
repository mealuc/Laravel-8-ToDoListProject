<?php

namespace App\Http\Controllers;

use App\Models\ToDoTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $tasklist = ToDoTask::where('ownerID',Auth::id())->get();
        return view('home.home',['tasklist'=>$tasklist]);
    }

    public function userLogin(){
        return view('home.login');
    }

    public function userLoginCheck(Request $request){

        if($request->isMethod('post')){
            $credentials = $request->only('email', 'password');
            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->intended('home');
            }
            return redirect()->intended('user/login')->withErrors([''=>'The provided credentials do not match our records',]);
        }
        else{
            return view('userLogin');
        }
    }

    public function userLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('user/login');
    }
}
