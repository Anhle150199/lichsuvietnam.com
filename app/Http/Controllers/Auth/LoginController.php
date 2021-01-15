<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
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
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
            $active = 1;

            if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => $active])) {

                // return redirect()->intended('/home');
                // return Redirect::intended();
                return redirect()->intended('defaultpage');

            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                // Session::flash();
                return redirect('login')->with('error', 'Email hoặc mật khẩu không đúng!');
            }
        }
    }

    // public function redirectProvider($socialite)
    // {
    //     return Socialite::driver($socialite)->redirect();
    // }
    // public function handleProviderCallback($socialite)
    // {
    //     $user = Socialite::driver($socialite)->user();
    //     $authUser = $this->findOrCreateUser($user);
    //     $this->postLogin($authUser);
    //     // return $user;
    //     // Auth::login($authUser);
    //     return redirect('/');
    // }
    // public function findOrCreateUser($user)
    // {
    //     $authUser = User::where('social_id', $user->id)->first();
    //     if ($authUser) {
    //         return $authUser;
    //     } else {
    //         return User::created(
    //             [
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'password' => '',
    //                 'level' => 0,
    //                 'active' => 1,
    //                 'avatar' => $user->avatar,
    //                 'created_at' => date("Y-m-d H:i:s")
    //             ]
    //         );
    //     }
    // }
}
