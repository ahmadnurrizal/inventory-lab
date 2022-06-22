@extends('layouts.onboarding')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center"
    style="background-color: #FF9900; min-height: 100vh;">
    <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
        <h1 class="mx-auto title">Register</h1>
        <h1 class="mx-auto title">Form</h1>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- input Name -->
            <div class="mb-3 row">
                <div class="icon-box">
                    <i class="bi bi-person" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="text" name="nameRegis" id="nameRegis" placeholder="Name" required />
                </div>
            </div>
            <!-- input NIM -->
            <div class="mb-3 row">
                <div class="icon-box">
                    <i class="bi bi-person" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="number" name="nim" id="nim" placeholder="NIM" required />
                </div>
            </div>
            <!-- input E-mail -->
            <div class="mb-3 row">
                <div class="icon-box">
                    <i class="bi bi-envelope" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="email" name="email" id="emailRegis" placeholder="E-mail" required />
                </div>
            </div>
            <!-- input password -->
            <div class="mb-3 row">
                <div class="icon-box">
                    <i class="bi bi-file-lock2" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="password" name="passwordRegis" id="passwordRegis" placeholder="Password" required>
                </div>
            </div>
            <!-- input phone number -->
            <div class="mb-3 row">
                <div class=" icon-box">
                    <i class="bi bi-telephone" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="string" name="phoneNumberRegis" id="phoneNumberRegis" placeholder="Phone Number"
                        required>
                </div>
            </div>
            <!-- input address -->
            <div class="mb-4 row">
                <div class=" icon-box">
                    <i class="bi bi-geo-alt" style="color: white;"></i>
                </div>
                <div class="col-10">
                    <input type="text" name="addressRegis" id="addressRegis" placeholder="Address" required>
                </div>
            </div>

            <button type="submit" class="btn-login-register float-end">Register</button>
        </form>
    </div>
</div>
@endsection
