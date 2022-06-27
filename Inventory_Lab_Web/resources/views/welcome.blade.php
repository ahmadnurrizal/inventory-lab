@extends('layouts.onboarding')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="row" style="width:350px">
        <a href="/borrowing-form" class="btn btn-light"
            style="margin-bottom: 2vh; color:#FF9900; padding:20px; border-radius:24px">
            <div class="d-flex align-items-center">
                <div class="col-md-4 flex-shrink-0">
                    <img src="{{asset('img/bg/group 146.png')}}" alt="" style="width:100%;height:100%">
                </div>
                <div class="col-md-8 flex-grow-1 ms-3">
                    <h2><b>Borrowing</b></h2>
                </div>
            </div>
        </a>
        <!-- <a class="btn btn-light" style="color: #FF9900;padding:20px; border-radius:24px">
          <div class="d-flex align-items-center">
            <div class="col-md-4 flex-shrink-0">
              <img src="{{asset('img/bg/group 145.png')}}" alt="" style="width:100%;height:100%">
            </div>
            <div class="col-md-8 flex-grow-1 ms-3">
              <h2><b>Returning</b></h2>
            </div>
          </div>
        </a> -->
    </div>
</div>
@endsection
