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
                        <h2 class="content-header-title float-left mb-0">Backend Users</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <button style="float: right;" type="button" id="tambah-btn" name="tambah"
                    class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal">Add BackendUser</button>
            </div>
        </div>
        <table class="table table-bordered yajra-datatable" id="datatables-ajax">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Role</th>
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
                        <h5 class="modal-title" id="modal-title">Tambah Backend User</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" class="form-data-validate" novalidate>
                        <input type="hidden" name="id" id="id" value="">
                        <div class="mb-3 row">
                            <div class="col">
                                <input type="text" name="item_name" id="name" class="form-control" placeholder="Item name"
                                    aria-label="Item name" required>
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

@section('assets_js')
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function(){
    $('#datatables-ajax').DataTable({
      processing: true,
      serverSide: true,
      ajax: "{{route('user.BackendUser')}}",
      columns: [
          { data: 'user_id', name: 'user_id' },
          { data: 'user_name', name: 'user_name' },
          { data: 'email', name: 'email' },
          { data: 'phone_number', name: 'phone_number'},
          { data: 'address', name: 'address'},
          {data: 'role', name:'role'},
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width:'20%'
          },
      ]
    })


  })

</script>
@endsection

</html>
