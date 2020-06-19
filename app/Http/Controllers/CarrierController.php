<?php

namespace App\Http\Controllers;

use App\CarrierPost;
use App\District;
use App\PoliceStation;
use App\PostOffice;
use App\RequestPost;
use App\User;
use Illuminate\Http\Request;

class CarrierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show', 'getPoliceStations');    
        $this->middleware('mobileVerified')->except('show', 'getPoliceStations');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carrier.index', ['posts' => CarrierPost::where('user_id', auth()->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrier.create', ['districts' => District::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'date'  =>  'required',
            'to_district_id'    =>  'required',
            'to_police_station_id'  =>  'required',
            'from_police_station_id'    =>  'required',
            'to_post_office_id' =>  'required',
            'from_district_id'  =>  'required',
            'from_post_office_id'  =>  'required',
            'from_address_details'  =>  'required',
            'to_address_details'  =>  'required',
        ]);
        $post = CarrierPost::create($request->all());

        $requests = RequestPost::whereDate('from_date', '<=', $request->date)->whereDate('to_date', '>=', $request->date)
        ->where('to_district_id', $request->to_district_id)
        ->where('to_police_station_id', $request->to_police_station_id)
        ->where('from_district_id', $request->from_district_id)
        ->where('from_police_station_id', $request->from_police_station_id)
        ->pluck('user_id');

        $mobileNumbers = User::whereIn('id', $requests)->pluck('mobile_number')->implode(',');


        $text = "A new Carrier Post Has Been Created Based On Your Request. Pleaase Follow : ".route('carrier-post.show', $post);



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
        if($sendstatus == 1101 ){
            return back()->with('success-message', 'Your Carrier Post Created');
        }

        return back()->with('success-message', 'Your Carrier Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CarrierPost $carrierPost)
    {
        return view('carrier.single', ['post' => $carrierPost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarrierPost $carrierPost)
    {
        $carrierPost->delete();
        return back()->with('success-message', 'Post Deleted Successfully!');
    }

    public function getPoliceStations(Request $request)
    {
        if($request->district_id){
            
            $district_id = str_pad($request->district_id, 2, '0', STR_PAD_LEFT); 
            // return $district_id;
            $policeStations = PoliceStation::where('district_id', $district_id)->get();
            $postOffices = PostOffice::where('district_id', $district_id)->get();

            return [$policeStations, $postOffices ];
        }
    }
}
