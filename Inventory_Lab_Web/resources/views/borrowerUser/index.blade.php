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
                        <h2 class="content-header-title float-left mb-0">Borrower Users</h2>
                    </div>
                </div>
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
      ajax: "{{route('user.Borrower')}}",
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
