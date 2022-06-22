
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-5">
        <h6>Borrower Name:</h6> <h4>{{$borrowing->user->user_name}}</h4>
      </div>
      <div class="col-md-7">
        <div class="row">
          <div class="col-md-4">
            <span>Email: </span>
          </div>
          <div class="col-md-8">
            <span>{{$borrowing->user->email}}</span>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <span>User ID: </span>
          </div>
          <div class="col-md-8">
            <span>{{$borrowing->user->user_id}}</span>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <span>Phone Number: </span>
          </div>
          <div class="col-md-8">
            <span>{{$borrowing->user->phone_number}}</span>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <span>Address: </span>
          </div>
          <div class="col-md-8">
            <span>{{$borrowing->user->address}}</span>
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <h3>Dates</h3>
    <div class="row">
      <div class="col-md-6">
        <h5>Borrowed At</h5>
        <h6>{{date('d-m-Y', strtotime($borrowing->created_at))}}</h6>
      </div>
      <div class="col-md-6">
        <h5>Estimated Returning At</h5>
        <h6>{{date('d-m-Y', strtotime($borrowing->return_at))}}</h6>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <h3>Borrowed Items</h3>
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>Item ID</th>
              <th>Item Name</th>
          </tr>
          @foreach($borrowing->items as $item)
          <tr>
            <td>{{$item->item_id}}</td>
            <td>{{$item->item_name}}</td>
          </tr>
          @endforeach
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
  <hr>
  <div class="container">
    <h3>Status</h3>
    <h1>{{$borrowing->status}}</h1>
  </div>

</div>
