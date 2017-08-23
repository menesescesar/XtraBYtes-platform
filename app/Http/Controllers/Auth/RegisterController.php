<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Activation;
use Illuminate\Support\Facades\Mail;
use Alert;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    // override register
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        if(User::whereEmail($request->email)->first())
            return redirect()->back()->with(['error'=>trans('auth.EMAIL_EXISTS')]);

        if(User::whereUsername($request->username)->first())
            return redirect()->back()->with(['error'=>trans('auth.USERNAME_EXISTS')]);

        //activation code
        $code = bin2hex(openssl_random_pseudo_bytes(16));

        event(new Registered($user = $this->create($code,$request->all())));

        alert()->success('Success', 'Your account created. Activation link sent to email.')->autoclose(3000);

        return redirect('/login');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6|max:15',
            //'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($code,array $data)
    {

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $activation = Activation::create([
            "user_id" => $user->id,
            "token" => $code
        ]);

        //app('App\Http\Controllers\Auth\ActivationController')->activate($code);

        $this->sendEmail($user,$activation->token);

        return $user;
    }

    private function sendEmail($user,$code)
    {
        Mail::send('emails.activation',
        [
            'user'       => $user,
            'code'      => $code
        ],
        function($message) use ($user)
        {
            $message->to($user->email);
            $message->subject(trans('auth.ACTIVATE',['name'=>"$user->username"]));
        });
    }
}
