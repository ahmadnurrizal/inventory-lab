<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/auth.css">

    <style>
        .input-group-text {
            background-color: orange !important;
            color: white !important;
        }

        .disabledbutton {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>

    <title>Register</title>
</head>

<body>
    <div class="container-fluid d-flex align-items-center justify-content-center"
        style="background-color: orange; min-height: 100vh;">
        <div class="container">
            <div class="row">
                <!-- Borrowing Form -->
                <div class="col-xxl-5 d-flex justify-content-between align-items-center">
                    <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; width: 400px;">
                        <h1 class="mx-auto title">Borrowing Form</h1>
                        <hr>
                        <form id="form-data">
                            @csrf
                            <!-- input id number -->
                            <div class="mb-3 row">
                                <div class=" icon-box">
                                    <i class="bi bi-person-badge" style="color: white;"></i>
                                </div>
                                <div class="col-10">
                                    <input type="text" id="idNumberRegis" name="idNumberRegis" placeholder="ID Number"
                                        required>
                                </div>
                            </div>
                            <!-- input password -->
                            <div class="mb-3 row">
                                <div class="icon-box">
                                    <i class="bi bi-file-lock2" style="color: white;"></i>
                                </div>
                                <div class="col-10">
                                    <input type="password" id="passwordRegis" name="passwordRegis"
                                        placeholder="Password" required>
                                </div>
                            </div>

                            <button type="submit" class="btn-login-register float-end">Confirm</button>
                        </form>
                    </div>
                </div>

                <!-- Borrowed Items -->
                <div class="col" id="borrowing-form">
                    <form action="{{ url('/borrow') }}" method="post">
                        @csrf
                        <div class="card px-5 py-4 mx-auto" style="border-radius: 20px; ">

                            <table id="datatable" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th scope=" col">ID Item</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Check</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->category}}</td>
                                        <td><input style="height: 20px;box-shadow: none;" type="checkbox"
                                                value="{{$item->id}}" name="itemList[]"></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <div class="row mt-3">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-calendar-day"></i></span>
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn-login-register float-start">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        var table = $('#datatable').DataTable({
            // responsive: true,
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": false,
            "ordering": false
        });

        new $.fn.dataTable.FixedHeader(table);
    });

    $('#borrowing-form').hide()
    Array.prototype.filter.call($('#form-data'), function (form) {
        form.addEventListener('submit', function (event) {
            let formData = new FormData(this);
            event.preventDefault();

            var url = "{{ route('borrowing.confirm') }}"
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
                        $('#borrowing-form').show()
                    } else {
                        var reset_form = $('#form-data')[0];
                        $(reset_form).removeClass('was-validated');
                        reset_form.reset();
                    }
                    Swal.fire(response.message)
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
