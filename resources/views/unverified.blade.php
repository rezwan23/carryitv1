@extends('layouts.master')
@section('title', 'Please Verify Your Account')

@section('appTitle')

<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
    </ul>
</div>

@endsection

@section('content')

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="alert alert-dismissible alert-danger">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Hey {{auth()->user()->name}}!</strong>Please Activate Your Account.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{route('verify.mobile')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Verification Code</label>
                <input class="form-control" type="text" name="code" placeholder="Verification Code">
            </div>
            <button class="btn btn-primary" type="submit">Verify</button>
        </form>
    </div>
</div>

@endsection