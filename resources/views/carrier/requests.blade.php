@extends('layouts.master')

@section('title', 'Requests')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Requests</h1>
        <p>Start a beautiful journey here</p>
    </div>
</div>

@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>My Posts</h4>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
        @include('layouts.messages')
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Post</th>
                    <th>Requested By</th>
                    <th>Weight</th>
                    <th>Payable</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td><a target="_blank" class="btn btn-sm btn-primary" href="{{route('carrier-post.show', $post->carrier_post_id)}}">View</a></td>
                    <td>{{$post->requestedBy->mobile_number}}</td>
                    <td>{{$post->weight}}</td>
                    <td>{{$post->payable_amount}}</td>
                    <td><textarea name="" readonly class="form-control" id="" cols="30" rows="10">{{$post->description}}</textarea></td>
                    <td>{{$post->status}}</td>
                    <td>
                        @if($post->status == 'Requested')
                            <a href="{{route('assign.accept', $post)}}" class="btn btn-primary btn-sm">Accept</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection
