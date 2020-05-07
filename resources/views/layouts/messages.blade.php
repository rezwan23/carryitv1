@if (\Illuminate\Support\Facades\Session::has('success-message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>Success! </strong>{{\Illuminate\Support\Facades\Session::get('success-message')}}
</div>
@endif

@if (\Illuminate\Support\Facades\Session::has('error-message'))
<div class="alert bg-red alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>Error! </strong>{{\Illuminate\Support\Facades\Session::get('error-message')}}
</div>
@endif