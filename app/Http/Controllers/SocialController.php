<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response, File;
use Laravel\Socialite\Facades\Socialite;

use App\Models\User;

class SocialController extends Controller
{
    // public function redirect($provider)
    // {
    //     return Socialite::driver($provider)->redirect();
    // }
    // public function callback($provider)
    // {
    //     $getInfo = Socialite::driver($provider)->user();
    //     $user = $this->createUser($getInfo, $provider);
    //     // auth()->login($user);
    //     $email = $user->email;
    //     return $email;
    //     $socialId = $user->id;
    //     $active = 1;

    //     if (Auth::attempt(['email' => $email, 'social_id' => $socialId, 'active' => $active])) {

    //         return redirect()->route('home');
    //     } else {
    //         // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
    //         // Session::flash();
    //         return redirect('login')->with('error', 'Liên kết tài khoản đã bị khóa!');
    //     }
    // }
    // function createUser($getInfo, $provider)
    // {
    //     $user = User::where('social_id', $getInfo->id)->first();
    //     if (!$user) {
    //         $user = User::create([
    //             'name'     => $getInfo->name,
    //             'email'    => $getInfo->email,
    //             // 'provider' => $provider,
    //             'social_id' => $getInfo->id,
    //             'password' => '',
    //             'level' => 0,
    //             'active' => 1,
    //             // 'avatar' => $user->avatar,
    //             'created_at' => date("Y-m-d H:i:s")
    //         ]);
    //     }
    //     return $user;
    // }
}
