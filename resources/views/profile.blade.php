@extends('layouts.master')

@section('title', 'User Profile')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-user"></i> User Profile</h1>
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
        @include('layouts.messages')
        <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
            @csrf            
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Name">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Name">Mobile Number</label>
                        <input type="text" readonly class="form-control" value="{{$user->mobile_number}}">
                    </div>
                    <div class="form-group">
                        <label for="Name">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <img src="/uploads/{{$user->image}}" alt="" height="140px" width="140px">
                    </div>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
