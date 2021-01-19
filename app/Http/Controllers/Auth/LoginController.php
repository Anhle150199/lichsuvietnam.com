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

    protected $providers = [
        'facebook', 'google'
    ];

    public function redirectToProvider($driver)
    {
        // if (!$this->isProviderAllowed($driver)) {
        //     return $this->sendFailedResponse("{$driver} is not currently supported");
        // }

        // try {
        return Socialite::driver($driver)->redirect();
        // } catch (Exception $e) {
        //     // You should show something simple fail message
        //     return $this->sendFailedResponse($e->getMessage());
        // }
    }


    public function handleProviderCallback($provider)
    {
        // try {
        //     $user = Socialite::driver($driver)->user();
        // } catch (Exception $e) {
        //     return $this->sendFailedResponse($e->getMessage());
        // }

        // // check for email in returned user
        // return empty($user->email)
        //     ? $this->sendFailedResponse("No email id returned from {$driver} provider.")
        //     : $this->loginOrCreateAccount($user, $driver);
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);
        return redirect()->to('/home');
    }

    // protected function sendSuccessResponse()
    // {
    //     return redirect()->intended('home');
    // }
    function createUser($getInfo, $provider)
    {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
    protected function sendFailedResponse($error = null)
    {
        return redirect()->route('login')
            ->withErrors(['error' => $error ?: 'Unable to login, try with another provider to login.']);
    }

    protected function loginOrCreateAccount($providerUser, $driver)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();

        // if user already found
        if ($user) {
            // update the avatar and provider that might have changed
            $user->update([
                'avatar' => $providerUser->avatar,
                'provider' => $driver,
                'provider_id' => $providerUser->id,
                'access_token' => $providerUser->token
            ]);
        } else {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar(),
                'provider' => $driver,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => ''
            ]);
        }

        // login the user
        Auth::login($user, true);

        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($driver)
    {
        return in_array($driver, $this->providers) && config()->has("services.{$driver}");
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
                return redirect('login')->with('error', 'Email hoặc mật khẩu không đúng!');
            }
        }
    }
}
