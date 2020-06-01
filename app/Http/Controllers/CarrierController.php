<?php

namespace App\Http\Controllers;

use App\CarrierPost;
use App\District;
use App\PoliceStation;
use App\PostOffice;
use Illuminate\Http\Request;

class CarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'from_district_id'  =>  'required',
            'from_address_details'  =>  'required',
            'to_address_details'  =>  'required',
        ]);
        CarrierPost::create($request->all());
        return back()->with('success-message', 'Your Carrier Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
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
