@extends('layouts.master')

@section('title', 'All My Request')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> All My Request Post</h1>
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
        <h4>My Request Posts</h4>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6">
        @include('layouts.messages')
        <div class="card">
            <div class="card-header">
                My Requests
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <td>From</td>
                            <td>To</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)

                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{\Carbon\Carbon::parse($post->from_date)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($post->to_date)->format('d/m/Y')}}</td>
                                <td>{{$post->fromDistrict->name}}</td>
                                <td>{{$post->toDistrict->name}}</td>
                                <td>{{$post->description}}</td>
                                <td>
                                    <a href="{{route('request-post.show', $post)}}" class="btn btn-success btn-sm float-left">View</a>
                                    <a onclick="event.preventDefault();document.getElementById('request_form_{{$post->id}}').submit();" href="#" class="btn btn-danger btn-sm float-left">Delete</a>

                                    <form onsubmit="return confirm('Are you sure?')" action="{{route('request-post.destroy', $post)}}" method="post" id="request_form_{{$post->id}}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
