<?php

namespace App\Http\Controllers;

use App\District;
use App\RequestPost;
use Illuminate\Http\Request;

class RequestPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('request.index', ['posts' => RequestPost::where('user_id', auth()->user()->id)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create', ['districts' => District::all()]);
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
            'to_date'  =>  'required',
            'from_date'  =>  'required',
            'to_district_id'    =>  'required',
            'to_police_station_id'  =>  'required',
            'from_police_station_id'    =>  'required',
            'from_district_id'  =>  'required',
            'description'   =>  'required'
        ]);
        RequestPost::create($request->all());
        return back()->with('success-message', 'Your Request Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RequestPost $requestPost)
    {
        return view('request.single', ['post' => $requestPost]);
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
    public function destroy(RequestPost $requestPost)
    {
        $requestPost->delete();
        return back()->with('success-message', 'Request Post Deleted Successfully!');
    }
}
