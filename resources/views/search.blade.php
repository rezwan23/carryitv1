@extends('layouts.master')

@section('title', 'Carrier Post Search')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-search"></i> Search Carrier Post</h1>
        <p>Start a beautiful journey here</p>
    </div>
    <!-- <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Carri</a></li>
    </ul> -->
</div>

@endsection


@section('content')

<div class="row @if($posts->count()>0) display_none @endif">
    <div class="col-md-12">
        <h4>Search Carrier Post</h4>
    </div>
    <div class="col-md-12">
        @include('layouts.messages')
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input name="date" type="date" class="form-control @error('date') is-invalid @enderror">
                        @error('date')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">From Address</h4>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">District</label>
                        <select class="form-control demoSelect" name="from_district_id" id="from_district_id" onchange="loadPoliceStations(0)">
                            <optgroup label="Select Cities">
                                <option value="*">--</option>
                                @foreach($districts as $discrict)
                                <option value="{{$discrict->district_id}}">{{$discrict->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('from_district_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Police Station</label>
                        <select class="form-control demoSelect" name="from_police_station_id" id="from_ps">

                        </select>
                        @error('from_police_station_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Post Office</label>
                        <select class="form-control demoSelect" name="from_post_office_id" id="from_po">

                        </select>
                        @error('from_police_station_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">To Address</h4>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">District</label>
                        <select class="form-control demoSelect" name="to_district_id" id="to_district_id" onchange="loadPoliceStations(1)">
                            <optgroup label="Select Cities">
                                <option value="*">--</option>
                                @foreach($districts as $discrict)
                                <option value="{{$discrict->district_id}}">{{$discrict->name}}</option>
                                @endforeach
                            </optgroup>
                        </select>
                        @error('to_district_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Police Station</label>
                        <select class="form-control demoSelect" name="to_police_station_id" id="to_ps">

                        </select>
                        @error('to_police_station_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Post Office</label>
                        <select class="form-control demoSelect" name="to_post_office_id" id="to_po">

                        </select>
                        @error('to_post_office_id')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>

@if($posts->count()>0)
<div class="row">
    <div class="col-md-12">
        <h2>Search Result</h2>
        <a class="btn btn-primary" href="{{route('search')}}">Search Again</a>
    </div>
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
@endif
@endsection

@section('scripts')
<script type="text/javascript" src="/admin/js/plugins/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.demoSelect').select2();
    })

    function loadPoliceStations(isTo) {
        var id = '';
        if (isTo) {
            id = '#to_district_id';
        } else {
            id = '#from_district_id';
        }
        let districtId = $(id).val();

        if (isTo == 1) {
            $.get('/get-policestations?district_id=' + districtId, function(data) {
                $('#to_ps').empty();
                $('#to_po').empty();

                $('#to_ps').append('<option value="*">--</option>');
                $('#to_po').append('<option value="*">--</option>');

                for (let i = 0; i < data[0].length; i++) {
                    $('#to_ps').append('<option value="' + data[0][i].id + '">' + data[0][i].name + '</option>');
                }
                for (let i = 0; i < data[1].length; i++) {
                    $('#to_po').append('<option value="' + data[1][i].id + '">' + data[1][i].name + '</option>');
                }
            });
        } else {
            $.get('/get-policestations?district_id=' + districtId, function(data) {
                $('#from_ps').empty();
                $('#from_po').empty();

                $('#from_ps').append('<option value="*">--</option>');
                $('#from_po').append('<option value="*">--</option>');
                for (let i = 0; i < data[0].length; i++) {
                    $('#from_ps').append('<option value="' + data[0][i].id + '">' + data[0][i].name + '</option>');
                }
                for (let i = 0; i < data[1].length; i++) {
                    $('#from_po').append('<option value="' + data[1][i].id + '">' + data[1][i].name + '</option>');
                }
            });
        }
    }

    function searchAgain(){
        $('.row.display_none').removeClass('display_none')
    }
</script>

<script>
    function callMobile(el) {
        let call = 'tel:' + $(el).children('p.mobile_number').text();
        window.open(call);
    }
</script>
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
    .display_none{
        display: none;
    }
</style>

@endsection