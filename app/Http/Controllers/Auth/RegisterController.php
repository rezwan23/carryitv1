<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Verification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile_number' => ['required', 'string', 'max:16', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile_number' => $data['mobile_number'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $verificationCode = rand(1000, 9999);
        
        $text = "Welcome To CarryIt Your Verification Code : $verificationCode";

        Verification::create(['user_id' => $user->id, 'mobile_number' => $user->mobile_number, 'verification_number' => $verificationCode]);


        $url = "http://66.45.237.70/api.php";
        
        $number = $user->mobile_number;

        $data = array(
            'username' => "rezwan23",
            'password' => "3YFRB4VD",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];
        if($sendstatus != 1101 ){
            $user->delete();
        }
    }
}
