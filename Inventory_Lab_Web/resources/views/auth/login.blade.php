@extends('layouts.onboarding')
@section('content')
    <div class="container-fluid d-flex align-items-center justify-content-center" style="background-color: #FF9900; min-height: 100vh;">
        <div class="">
            <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
                <h1 class="mx-auto title">Admin Login</h1>
                <hr>
                <form>
                    <!-- input email -->
                    <div class="mt-3 row">
                        <div class="icon-box">
                            <i class="bi bi-envelope" style="color: white;"></i>
                        </div>
                        <div class="col-10">
                            <input type="email" id="emailLogin" placeholder="E-mail" />
                        </div>
                    </div>
                    <!-- input password -->
                    <div class="mt-4 row">
                        <div class="icon-box">
                            <i class="bi bi-file-lock2" style="color: white;"></i>
                        </div>
                        <div class="col-10">
                            <input type="password" id="passwordLogin" placeholder="Password">
                        </div>
                    </div>

                    <button type="submit" class="btn-login-register mt-4 float-end">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
