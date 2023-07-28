<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@extends('/layouts/template')
@section('sidebar')

@section('content')
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ADMIN</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div class="main-content">
<div class="page-content">
<div class="container-fluid">
    <h2>Manage Profile Merchant</h2>
    <br><br>
    <a class="btn btn-primary" onClick="add()" href="javascript:void(0)"> Create Merchant</a>
    <br>
    <br>
    <table class="table mt-4" id="posts-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MerchantModal" name="MerchantModal"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="POST" data-action="{{route('merchant.store')}}" enctype="multipart/form-data" id="add-merc-form" name="add-merc-form">
                @csrf
              <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
              </div>
              <div class="form-group">
                  <label for="name" class="form-label">Username :</label>
                  <input type="text" id="usrnm" name="username" class="form-control" placeholder="Enter Merchant Username" required="">
              </div>
              <div class="form-group">
                  <label for="name" class="form-label">Email :</label>
                  <input type="text" id="mail" name="email" class="form-control" placeholder="Enter Merchant Email" required="">
              </div>
              <div class="form-group">
                  <label for="name" class="form-label">Password :</label>
                  <input type="text" id="pwd" name="password" class="form-control" placeholder="Enter Merchant Password" required="">
              </div>
              <div hidden>
                <label class="form-label text-sm text-uppercase" for="lastupdatedby">Last Updated By : </label>
                <select class="form-select form-control-lg" id="lastupdatedby" name="last_updated_by" aria-label="Default select example">
                    @foreach ($lasts as $last)
                        <option value="{{$last->username}}"  {{$last->username == $last->username ? 'selected' : '' }}>{{$last->username}}</option>
                    @endforeach
                </select>
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="savedata">Submit</button>
              </div>

          </form>
         </div>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MerchantModal" name="MerchantModal">Edit Merchant</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="javascript:void(0)" method="POST" data-action="{{route('merchant.update')}}" enctype="multipart/form-data" id="edit-merc-form" name="edit-merc-form">
                @csrf
              <div class="alert alert-danger print-error-msg" style="display:none">
                  <ul></ul>
              </div>
              <div hidden>
                <label for="name" class="form-label">Id :</label>
                <input type="text" id="merid" name="id" class="form-control" placeholder="Enter Merchant Id" required="">
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Username :</label>
                <input type="text" id="usrnm" name="username" class="form-control" placeholder="Enter Merchant Username" required="">
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Email :</label>
                <input type="text" id="mail" name="email" class="form-control" placeholder="Enter Merchant Email" required="">
              </div>
              <div class="form-group">
                <label for="name" class="form-label">Password :</label>
                <input type="text" id="pwd" name="password" class="form-control" placeholder="Enter Merchant Password" required="">
              </div>
              <div hidden>
                <label class="form-label text-sm text-uppercase" for="lastupdatedby">Last Updated By : </label>
                <select class="form-select form-control-lg" id="lastupdatedby" name="last_updated_by" aria-label="Default select example">
                    @foreach ($lasts as $last)
                        <option value="{{$last->username}}">{{$last->username}}</option>
                    @endforeach
                </select>
              </div>
              <div hidden>
                <label for="name" class="form-label">Created at :</label>
                <input type="text" id="createda" name="created_at" class="form-control" placeholder="Enter Merchant Created at" required="">
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-primary" id="updatedata">Update</button>
              </div>

          </form>
         </div>
        </div>
      </div>
    </div>

@endsection
@endsection
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">

$(document).ready( function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var table = $('#posts-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('merchant.getMerchants') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
        {data: 'username', name: 'username'},
        {data: 'email', name: 'email'},
        {data: 'created_at', name: 'created_at'},
        {
            data: 'action',
            name: 'action',
            orderable: true,
            searchable: true
        }
    ],
});
});

function add(){
    $('#add-merc-form').trigger("reset");
    $('#MerchantModal').html("Create Merchant");
    $('#postModal').modal('show');
    $('#user_id').val('');
}


function editFunc(id){
    var userURL = "edit-merchant";
    $.ajax({
            type:"POST",
            url: userURL,
            data: { id: id },
            dataType: 'json',
            success: function(res){
            $('#MerchantModal').html("Edit Merchant");
            $('#Sttus').html("Edit Merchant");
            $('#editModal').modal('show');
            $("input[name=id]").val(res.id);
            $("input[name=username]").val(res.username);
            $("input[name=email]").val(res.email);
            $("input[name=password]").val(res.password);
            $("input[name=created_at]").val(res.created_at);
            $("input[name=last_updated_by]").val(res.last_updated_by);
            }
    });
}

function deleteFunc(id){
    var userURL = "delete-merchant";
    var id = id;

    if (confirm("Are you sure you want to delete this Merchant?") == true) {
        $.ajax({
            url: userURL,
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                var oTable = $('#posts-table').dataTable();
                oTable.fnDraw(false);

            }
        });
    }

}

$(document).ready( function () {
    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#add-merc-form').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
    type:'POST',
    url: "{{ url('store-merchant')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#postModal").modal('hide');
    // $("#editModal").modal('hide');
    var oTable = $('#posts-table').dataTable();
    oTable.fnDraw(false);
    $("#savedata").html('Submit');
    $("#savedata"). attr("disabled", false);
    },
    error: function(data){
    console.log(data);
    }
    });
});


$('#edit-merc-form').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
    type:'POST',
    url: "{{ url('update-merchant')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
    $("#editModal").modal('hide');
    var oTable = $('#posts-table').dataTable();
    oTable.fnDraw(false);
    $("#updatedata").html('Submit');
    $("#updatedata"). attr("disabled", false);
    },
    error: function(data){
    console.log(data);
    }
    });
});
});


</script>
</html>
