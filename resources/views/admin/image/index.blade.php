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
                              <th>Image</th>

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
        "processing": true,
            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/image/index/getdata') }}",
                     "dataType": "json",
                     "type": "POST",
                     "data":{ _token: "{{csrf_token()}}"}
                   },
        //   ajax: '{{url("admin/user/serverside")}}',

          columns: [
              { data: "id" },
              { data: "image" },


          ],
          //colReorder: true
      } );
  } );
  </script>

@endsection

@endsection
