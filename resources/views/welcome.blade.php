@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div class="row">
    @foreach($posts as $post)
    <div class="col-md-4">
        <div class="card">
            <h4 class="card-header">{{$post->title}} -- {{\Carbon\Carbon::parse($post->date)->format('d/m/Y H:i')}}</h4>
            <div class="card-body">
                <h4>{{$post->user->name}} is going to {{$post->toDistrict->name}} from {{$post->fromDistrict->name}}</h6>
                    <div class="post_single_body">
                        <h6 class="text-center">Details</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>From</h6>
                                <p>District : {{$post->fromDistrict->name}}</p>
                                <p>Police Station : {{$post->fromPS->name}}</p>
                            </div>
                            <div class="col-md-6">
                                <h6>To</h6>
                                <p>District : {{$post->toDistrict->name}}</p>
                                <p>Police Station : {{$post->toPS->name}}</p>
                            </div>
                            <div class="col-md-12 text-center call_icon" onclick="callMobile(this)">
                                <i class="fa fa-phone"></i>
                                <p class="mobile_number">{{$post->user->mobile_number}}</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <a target="_blank" href="{{route('carrier-post.show', $post)}}" class="btn btn-sm btn-primary">Details</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('head')

<style>
    .call_icon i {
        padding: 8px;
        font-size: 25px;
        background: #F86A43;
        color: #fff;
        height: 41px;
        width: 41px;
        border-radius: 50%;
    }
    .card{
        margin-bottom: 30px;
    }
</style>

@endsection

@section('scripts')

<script>
    function callMobile(el) {
        let call = 'tel:' + $(el).children('p.mobile_number').text();
        window.open(call);
    }
</script>

@endsection