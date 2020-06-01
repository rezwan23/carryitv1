@extends('layouts.master')

@section('title', 'Carrier Post Create')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Create Carrier Post</h1>
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
        <h4>Create Carrier Post</h4>
    </div>
    <div class="col-md-12">
        @include('layouts.messages')
        <form action="{{route('carrier-post.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">From Address Details</label>
                        <textarea name="from_address_details" class="form-control @error('from_address_details') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                        @error('from_address_details')
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">To Address Details</label>
                        <textarea name="to_address_details" class="form-control @error('to_address_details') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                        @error('to_address_details')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="date">Travel Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="4"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <button class="btn btn-primary" type="submit">Post</button>
            </div>
        </form>
    </div>
</div>

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
                for (let i = 0; i < data[0].length; i++) {
                    $('#from_ps').append('<option value="' + data[0][i].id + '">' + data[0][i].name + '</option>');
                }
                for (let i = 0; i < data[1].length; i++) {
                    $('#from_po').append('<option value="' + data[1][i].id + '">' + data[1][i].name + '</option>');
                }
            });
        }
    }
</script>
@endsection