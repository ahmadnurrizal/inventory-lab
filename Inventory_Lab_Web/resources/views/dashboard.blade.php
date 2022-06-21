@section('assets_css')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
@endsection

@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center dashboard-wrapper" style="min-height:20vh">
  <div class="col-md-4">
    <div class="dashboard-count-box">
      <div class="row d-flex align-items-center" style="height:100%">
        <div class="col-md-5">
          &nbsp;&nbsp;&nbsp;
          <img src="{{asset('img/bg/group 108.png')}}" alt="" style="width:80%;height:100%">
        </div>
        <div class="col-md-7">
          <div class="row dashboard-count-box-title" style="height:20%">
            <span>Total Items</span>
          </div>
          <div class="row">
            <span style="font-size:72px">001</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="dashboard-count-box">
      <div class="row d-flex align-items-center" style="height:100%">
        <div class="col-md-5">
          &nbsp;&nbsp;&nbsp;
          <img src="{{asset('img/bg/group 146.png')}}" alt="" style="width:80%;height:100%">
        </div>
        <div class="col-md-7">
          <div class="row dashboard-count-box-title" style="height:20%">
            <span>Total Items</span>
          </div>
          <div class="row">
            <span style="font-size:72px">001</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="dashboard-count-box">
      <div class="row d-flex align-items-center" style="height:100%">
        <div class="col-md-5">
          &nbsp;&nbsp;&nbsp;
          <img src="{{asset('img/bg/group 145.png')}}" alt="" style="width:80%;height:100%">
        </div>
        <div class="col-md-7">
          <div class="row dashboard-count-box-title" style="height:20%">
            <span>Total Items</span>
          </div>
          <div class="row">
            <span style="font-size:72px">001</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="dashboard-news-box">
      <img src="{{asset('img/bg/Path 23.png')}}" alt="" width="100%" height="35%">
    </div>
  </div>
  <div class="col-md-4">
    <div class="dashboard-news-box">
      <img src="{{asset('img/bg/Path 24.png')}}" alt="" width="100%" height="35%">
    </div>
  </div>

</div>
@endsection
