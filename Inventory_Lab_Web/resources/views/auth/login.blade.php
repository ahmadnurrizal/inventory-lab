@extends('layouts.onboarding')
@section('content')
<div class="container-fluid d-flex align-items-center justify-content-center"
    style="background-color: #FF9900; min-height: 100vh;">
    <div class="">
        <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
            <h1 class="mx-auto title">Admin Login</h1>
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
            <form id="form-data">
                @csrf
                <!-- input email -->
                <div class="mt-3 row">
                    <div class="icon-box">
                        <i class="bi bi-envelope" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="email" name="email" id="emailLogin" placeholder="E-mail" />
                    </div>
                </div>
                <!-- input password -->
                <div class="mt-4 row">
                    <div class="icon-box">
                        <i class="bi bi-file-lock2" style="color: white;"></i>
                    </div>
                    <div class="col-10">
                        <input type="password" name="password" id="passwordLogin" placeholder="Password">
                    </div>
                </div>
                <button type="submit" id="button" class="btn-login-register mt-4 float-end">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('assets_js')
<script type="text/javascript">
    $(document).ready(function () {
        Array.prototype.filter.call($('#form-data'), function (form) {
            form.addEventListener('submit', function (event) {
                let formData = new FormData(this);
                event.preventDefault();

                var url = "{{ url('login')}}"
                $.ajax({
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (!response.error) {
                            let timerInterval
                            Swal.fire({
                                html: 'Success to login',
                                timer: 1200,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            }).then((result) => {
                                /* Read more about handling dismissals below */
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    window.location.href = '/admin/dashboard'
                                }
                            })
                        } else {
                            Swal.fire("Email or password doesn't match")
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
@endsection
