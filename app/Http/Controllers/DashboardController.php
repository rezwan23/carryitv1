<?php

namespace App\Http\Controllers;

use App\CarrierPost;
use App\Carry;
use App\User;
use App\Verification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('unverified');
        $this->middleware('auth')->only('verify');
    }
    public function unverified()
    {
        if(!auth()->user()->invalidatedUser){
            return redirect()->route('dashboard');
        }
        return view('unverified');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function verify(Request $request)
    {
        $user = Verification::where('user_id', auth()->user()->id)
        ->where('mobile_number', auth()->user()->mobile_number)
        ->where('verification_number', $request->code)
        ->first();
        abort_if(!$user, 500, 'Incorrect Code');
        
        Verification::where('user_id', auth()->user()->id)
        ->where('mobile_number', auth()->user()->mobile_number)
        ->where('verification_number', $request->code)
        ->delete();

        return redirect()->route('dashboard');
    }

    public function profile()
    {
        return view('profile', ['user' => auth()->user()]);
    }

    public function saveProfile(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'email', 'image' => 'image|max:250']);
        
        $data = $request->only(['name', 'email']);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('/');
        }
        
        
        $user = auth()->user();

        $user->update($data);
        return back()->with('success-message', 'Profile Updated!');
    }

    public function assign(CarrierPost $post)
    {
        return view('carrier.assign', ['post' => $post]);
    }

    public function storeAssign(Request $request, CarrierPost $post)
    {
        $pass = rand(1000, 4000);

        Carry::create(array_merge($request->all(), [
            'requested_by'  =>  auth()->user()->id,
            'status'    =>  'Requested',
            'passphrase'    =>  $pass,
            'carrier_post_id'   =>  $post->id,
        ]));

        $mobileNumbers = $post->user->mobile_number;


        $text = "A new Carrier Post Has Been Requested Based On Your Travel";



        $url = "http://66.45.237.70/api.php";
        
        $number = $mobileNumbers;

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
        return back()->with('success-message', 'Your Carry Requested');
    }
}
