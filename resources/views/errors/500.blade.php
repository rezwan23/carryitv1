@extends('layouts.master')

@section('title', 'Error')

@section('content')
<div class="page-error tile">
    <h1><i class="fa fa-exclamation-circle"></i> Error </h1>
    <p>{{ $exception->getMessage() }}.</p>
    <p><a class="btn btn-primary" href="javascript:window.history.back();">Go Back</a></p>
</div>
@endsection