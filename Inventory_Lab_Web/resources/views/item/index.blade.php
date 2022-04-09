<!-- <!DOCTYPE html>
<html>

<head>
    <title>Items</title>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head> -->
@section('assets_css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">

<body>

    @section('content')
    <div class="container mt-5">
        <div class="content-header row p-1">

            <div class="col">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Items</h2>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col">
                <button style="float: right;" type="button" id="tambah-btn" name="tambah"
                    class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal">Add Item</button>
            </div>
        </div>
        <table class="table table-bordered yajra-datatable" id="datatables-ajax">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-data" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Tambah Item</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" class="form-data-validate" novalidate>
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Item name"
                                    aria-label="Item name" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">

                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Item description" aria-label="Item description" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" name="category" id="category" class="form-control"
                                    placeholder="Category" aria-label="Category" required>
                            </div>
                            <div class="col">
                                <input type="number" name="quantity" id="quantity" class="form-control"
                                    placeholder="Quantity" aria-label="Quantity" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" name="stored_location" id="stored_location" class="form-control"
                                    placeholder="Stored Location" aria-label="Stored Location" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="file" class="form-control" required name="image" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
</body>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

@section('assets_js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#modal").on("hidden.bs.modal", function (e) {
            const reset_form = $('#form-data')[0];
            reset_form.reset()
            document.getElementById("id").value = null;
            $("#modal-title").html("Add Data Item")
        });

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('items.list') }}",
            columns: [
                // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'id', name: 'id' },
                { data: 'image', name: 'image' },
                { data: 'name', name: 'name' },
                { data: 'quantity', name: 'quantity' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
    });

    Array.prototype.filter.call($('#form-data'), function (form) {
        form.addEventListener('submit', function (event) {
            let formData = new FormData(this);
            event.preventDefault();

            let item_id = $("#id").val();

            var url = (item_id !== undefined && item_id !== null) && item_id ? "{{ url('item')}}" + "/" + item_id : "{{ url('item')}}";
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
                    $('#modal').modal('hide');
                    setTimeout(function () { $('#datatables-ajax').DataTable().ajax.reload(); }, 1000);

                    // alert("berhasil add item")
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

    function edit_data(e) {

        $('#modal').modal('show')
        var url = "{{url('item')}}" + "/" + e.attr('data-id') + "/" + "edit"
        $.ajax({
            url: url,
            method: "GET",
            // dataType: "json",
            success: function (result) {
                console.log(result)
                $("#modal-title").html("Edit Data item")
                $('#id').val(result.id).trigger('change');
                $('#name').val(result.name);
                $('#description').val(result.description);
                $('#category').val(result.category);
                $('#quantity').val(result.quantity);
                $('#stored_location').val(result.stored_location);

            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }

        });
    }

    function delete_data(e) {

        var id = e.attr('data-id');
        jQuery.ajax({
            url: "{{url('/item')}}" + "/" + id,
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                '_method': 'delete'
            },
            success: function (result) {

                if (result.error) {
                    alert('gagal delete')

                } else {
                    setTimeout(function () { $('#datatables-ajax').DataTable().ajax.reload(); }, 1000);
                    alert('berhasil delete')
                }
            }
        });

    }
</script>
@endsection

</html>
