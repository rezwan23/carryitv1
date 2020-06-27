@extends('layouts.master')

@section('title', 'Carrier Post Assign')


@section('appTitle')
<div class="app-title">
    <div>
        <h1><i class="fa fa-dashboard"></i> Assign Carrier Post</h1>
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
        <h4>Assign Carrier Post</h4>
    </div>
    <div class="col-md-12">
        @include('layouts.messages')
        <form action="{{route('carrier-post-assign', $post)}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">From</label>
                        <input name="from" readonly value="{{$post->fromDistrict->name}}" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="title">to</label>
                        <input name="to" readonly value="{{$post->toDistrict->name}}" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Distance (KM)</label>
                        <input type="number" id="distance" readonly class="form-control" value="{{$post->distance()}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <textarea name="description" required class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Weight</label>
                                <select onchange="calculateWeight()" id="weight" name="weight" class="form-control" id="">
                                    <option value="1">Up To 1 Kg</option>
                                    <option value="2">2 Kg</option>
                                    <option value="3">3 Kg</option>
                                    <option value="4">4 Kg</option>
                                    <option value="5">5 Kg</option>
                                    <option value="*">More Than 5 Kg</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Payable</label>
                                <input type="number" step=".01" required readonly class="form-control" name="payable_amount" id="amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Received By</label>
                                <input type="text" step=".01" required  class="form-control" name="received_by" id="amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Received By Mobile Number</label>
                                <input type="text" step=".01" required  class="form-control" name="received_by_mobile_number" id="amount">
                            </div>
                        </div>
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
    function calculateWeight(){
        let weight = $('#weight').val();

        if(weight == '*'){
            $('#amount').removeAttr('readonly', 'readonly')
            $('#amount').val('')
        }else{
            weight = parseInt(weight);
            let distance = parseInt($('#distance').val());
            let amount = weight*distance*.1;

            if(amount<=100){
                $('#amount').val(100);
            }else{
                $('#amount').val(Math.ceil(amount));
            }
            $('#amount').attr('readonly', 'readonly')
        }
    }
</script>

@endsection