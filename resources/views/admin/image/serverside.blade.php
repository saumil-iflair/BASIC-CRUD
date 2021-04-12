@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Image Intervention') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>Image Intervention Form</h2>

                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                              <th>Image</th>
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
                     "url": "{{ url('admin/image/serverside/getdata') }}",
                     "dataType": "json",
                     "type": "POST",

                     "data":{ _token: "{{csrf_token()}}"}
                   },
        //   ajax: '{{url("admin/user/serverside")}}',

          columns: [
              { data: "id" },
              { data: "multipleimage" },
              { data: "option"  },

            //   data: [ ['1', 'desc'] ]


          ],
          'columnDefs': [ {

            // searching: false,

        'targets': [2], // column index (start from 0)
        'orderable': false, // set orderable false for selected columns

     }]

          //colReorder: true
      } );
  } );
  </script>

@endsection

@endsection
