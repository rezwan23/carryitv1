<?php

namespace App\Http\Controllers;

use App\CarrierPost;
use App\District;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('home', 'search');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        return view('welcome', ['posts' => CarrierPost::all()]);
    }

    public function search(Request $request)
    {
        if($request->filled('date')){
            $posts = CarrierPost::whereDate('date', $request->get('date'));
            if($request->filled('from_district_id') && $request->get('from_district_id') != '*'){
                $posts->where('from_district_id', $request->get('from_district_id'));
            }
            if($request->filled('from_police_station_id') && $request->get('from_police_station_id') != '*'){
                $posts->where('from_police_station_id', $request->get('from_police_station_id'));
            }
            if($request->filled('from_post_office_id') && $request->get('from_post_office_id') != '*'){
                $posts->where('from_post_office_id', $request->get('from_post_office_id'));
            }
            if($request->filled('to_district_id') && $request->get('to_district_id') != '*'){
                $posts->where('to_district_id', $request->get('to_district_id'));
            }
            if($request->filled('to_police_station_id') && $request->get('to_police_station_id') != '*'){
                $posts->where('to_police_station_id', $request->get('to_police_station_id'));
            }
            if($request->filled('to_post_office_id') && $request->get('to_post_office_id') != '*'){
                $posts->where('to_post_office_id', $request->get('to_post_office_id'));
            }

            return view('search', ['districts' => District::all(), 'posts' => $posts->get()]);
        }
        return view('search', ['districts' => District::all(), 'posts' => new Collection()]);
    }
}
