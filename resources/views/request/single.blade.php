@extends('layouts.master')

@section('title', 'Request Post Details')

@section('head')

<style>
    /* th, td{
        margin:0;
        padding: 5px 2px !important;
    } */
</style>

@endsection

@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Request Post Details</h1>
        <p>Start a beautiful journey here</p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Carri</a></li>
    </ul> -->
</div>

@endsection

@section('content')

<div class="row">
    <div class="card">
        <div class="card-header">
            Post Details
        </div>
        <div class="col-md-12">
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Posted By</th>
                            <td>{{$post->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td>{{$post->user->mobile_number}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{\Carbon\Carbon::parse($post->from_date)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($post->to_date)->format('d/m/Y')}}</td>
                        </tr>
                        <tr>
                            <th>From District</th>
                            <td>{{$post->fromDistrict->name}}</td>
                        </tr>
                        <tr>
                            <th>From Police Station</th>
                            <td>{{$post->fromPS->name}}</td>
                        </tr>
                        
                        <tr>
                            <th>To District</th>
                            <td>{{$post->toDistrict->name}}</td>
                        </tr>
                        <tr>
                            <th>To Police Station</th>
                            <td>{{$post->toPS->name}}</td>
                        </tr>
                        
                        <tr>
                            <th>Description</th>
                            <td>{{$post->description}}</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection