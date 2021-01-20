<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Exception;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);

        // Return home after login
        $user = User::where('email', '=', $user->email)->first();
        if ($user->active == 0) {
            return redirect()->route('login')->with('error', 'Tài khoản đã bị vô hiệu hóa!');
        }
        return redirect()->route('home');
    }
    
    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);

        $user = User::where('email', '=', $user->email)->first();
        if ($user->active == 0) {
            return redirect()->route('login')->with('error', 'Tài khoản đã bị vô hiệu hóa!');
        }
        // Return home after login
        return redirect()->route('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->social_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }
        if ($user->active == 0) {
            return redirect()->route('login')->with('error', 'Tài khoản đã bị vô hiệu hóa!');
        }
        Auth::login($user);
    }



    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);


        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');
            $active = 1;

            if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => $active])) {
                return redirect()->intended('defaultpage');
            } else {
                return redirect('login')->with('error', 'Email hoặc mật khẩu không đúng!');
            }
        }
    }
}
