@extends('layouts.app')
@section('assets_css')
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

<body>
    @section('content')
    <div class="container mt-5">
        <div class="content-header row p-1">

            <div class="col">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Borrowing</h2>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered yajra-datatable" id="datatables-ajax">
            <thead>
                <tr>
                    <th>Borrowing ID</th>
                    <th>Borrower Name</th>
                    <th>Items (Item ID)</th>
                    <th>Borrowing Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    @endsection
</body>

@section('assets_js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datatables-ajax').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('borrowing.list','borrowing')}}",
            columns: [
                { data: 'borrowing_id', name: 'borrowing_id' },
                { data: 'user_name', name: 'user_name' },
                { data: 'items', name: 'items' },
                { data: 'created_at', name: 'created_at' },
                { data: 'status', name: 'status' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '20%'
                },
            ]
        });

        $(document).ready(function () {

        }).on('click', '#btn-invoice', function () {
            let id = $(this).data('id');
            dialog = bootbox.dialog({
                title: "Invoice #" + id,
                size: 'large',
                message: '<center><div class="preloader"><div class="spinner-layer pl-red"><div class="circle-clipper left"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div></center>',
            })
            dialog.init(function (e) {
                let req = new XMLHttpRequest();
                req.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        dialog.find('.modal-content > .modal-body').html(this.responseText);
                    }
                };
                req.open("GET", '{{route("borrowing.invoice",'')}}/' + id, true);
                req.send();
            })
        })

        $(document).ready(function () {

        }).on('click', '#btn-returned', function () {
            const id = $(this).data('id');
            fetch(`/return-item/${id}`, {
                method: 'get',
            }).then(location.reload())

        })
    })

</script>
@endsection

</html>
