@extends('layouts.app')
@section('content')

    @include('flash-message')&nbsp;
    <a href="{{url('clear_cache')}}" style="margin-left: 1000px;" class="btn btn-success btn-sm mr-2">Cache Clear</a>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div>

<div class="row">
<div class="col-lg-10col-md-2 col-6 wow slideInRight mt-5" data-wow-duration="2s">
    <div class="single-fun-factor mb-14" style="width: 250px; border-radius: 50px;background-color: #f0ad4e;height: 180px;margin-left: 150px;">
        <h2 style="margin-left: 110px;font-size: 5rem;"><span class="website-counter">{{$get_all_gents}}</span></h2>
        <h4 style="margin-top: 9px; margin-left: 63px;">MEN's RECORD</h4>
    </div>
</div>


<div class="col-lg-10col-md-2 col-6 wow slideInRight mt-5" data-wow-duration="2s">
    <div class="single-fun-factor mb-14" style="width: 250px; border-radius: 50px;background-color: #f0ad4e;height: 180px;">
        <h2 style="margin-left: 110px;font-size: 5rem;"><span class="website-counter">{{$get_all_ladies}}</span></h2>
        <h4 style="margin-top: 9px; margin-left: 56px;font-size: 20px">WOMEN's RECORD</h4>
    </div>
</div>
</div>

@endsection
