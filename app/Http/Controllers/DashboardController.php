<?php

namespace App\Http\Controllers;

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
}
