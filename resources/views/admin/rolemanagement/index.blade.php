@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Role Management') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>Role Management</h2>

                         <div>
                              <a class="btn btn-primary" style="position: absolute;margin: -60px 761px;background-color: #277d27;" href="{{url('registerimport1')}}">Import</a>
                             </div>

                              <div class="col-sm-12 ">
                               <a  class="btn btn-primary checkexport" style="position: absolute;margin: -60px 828px;">Export</a>

                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;background-color: #d2891c;" href="{{url('exportpdf123')}}">Pdf</a>
                               </div>

                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Action</th>
                              {{-- <th>Action</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                            {{-- <form id="delete-form-{{$user->id}}"
                                + action="{{route('users.destroy', $user->id)}}"
                                method="post">
                              @csrf @method('DELETE')
                          </form>--}}
                            {{-- @if(count($rolemanagementpass)>0)

                            @foreach($rolemanagementpass as $row)

                            <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->role}}</td>
                            <td>{{$row->status}}</td> --}}

                            {{-- <td>
                            <a href="{{URL('admin\rolemanagement',$row->id)}}/edit" class="btn btn-primary">Edit</a>
                            {!! Form::open(['action'=>['admin\RoleController@destroy',$row->id],'method'=>'post']) !!}

                            {{ Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-cons m-b-10 bold'])}}
                            {!! Form::close() !!}
                            </td> --}}
                            {{-- </tr>

                            @endforeach

                        @endif --}}
                          </tbody>
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

        "processing": true,

            "serverSide": true,
            "ajax":{
                     "url": "{{ url('admin/rolemanagement/index/getdata') }}",
                     "dataType": "json",
                     "type": "POST",

                     "data":{ _token: "{{csrf_token()}}"}
                   },
        //   ajax: '{{url("admin/user/serverside")}}',

          columns: [
              { data: "id" },
              { data: "role" },
              { data: "status" },
              { data: "option"  },

            //   data: [ ['1', 'desc'] ]


          ],
          'columnDefs': [ {

            // searching: false,

        'targets': [3], // column index (start from 0)
        'orderable': false, // set orderable false for selected columns

     }]

          //colReorder: true
      } );
  } );
  </script>
  <script type="text/javascript">

    $(document).on('click','.checkexport', function() {
      alert("hii");
      var search = $('.dataTables_filter input').val();
            $.ajax({
                url: "{{url('contractors/export')}}",
                type: "post",
              data: { search : search},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(response){
                  var a = document.createElement("a");
                  a.href = response.url;
                  a.download = "role.xlsx";
                a.click();
                a.remove();
                }
            });
        });

     $('#exa1').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    console.log(value);
    });
  </script>

@endsection

@endsection
