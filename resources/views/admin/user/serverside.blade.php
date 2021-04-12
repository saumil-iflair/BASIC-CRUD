@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="container">
                        <h2>User data</h2>

                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Password</th>
                              <th>Confirm Password</th>
                              <th>Action</th>
                            </tr>
                          </thead>

                        </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@section('adminlte_js')
<script>
    $(document).ready(function() {
      $('#exa1').DataTable( {

        "order": [[ 0, "desc" ]],



        // Hide two columns




        "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/user/serverside/getdata') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },


          columns: [
              { data: "id" },
              { data: "name" },
              { data: "email" },
              { data: "pwd" },
              { data: "confpwd" },
              { data: "option"  }
          ],
          'columnDefs': [ {

        // searching: false,

        'targets': [5], // column index (start from 0)
        'orderable': false, // set orderable false for selected columns

        }]
          //colReorder: true
      } );
  } );
  </script>

@endsection

@endsection
