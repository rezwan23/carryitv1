@extends('layouts.master')

@section('title', 'All My Posts')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> All My Post</h1>
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
    <div class="col-md-12">
        <h4>My Posts</h4>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        @include('layouts.messages')
        @include('layouts.errors')
        <form action="{{route('receive.form')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Mobile Number</label>
                <input type="text" class="form-control" name="mobile_number">
            </div>
            <div class="form-group">
                <label for="">Passphrase</label>
                <input type="text" class="form-control" name="passphrase">
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Receive</button>
        </form>
    </div>
</div>

@endsection
