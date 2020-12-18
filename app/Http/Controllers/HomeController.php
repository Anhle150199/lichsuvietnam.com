<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     if (Auth::check()) {
    //         if(Auth::user()->active == 0){
    //             Auth::logout();
    //             $this->middleware('guest')->except('logout');
    //         }
    //     }
    // }

    /**
     * Show the application dashboard.  
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
}
