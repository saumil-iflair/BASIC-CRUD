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
                         <a class="btn btn-primary" style="position: absolute;margin: -60px 750px;" href="{{url('import')}}">Import</a>
                             </div>

                              <div class="col-sm-12 ">
                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 828px;" href="{{url('export')}}">Export</a>

                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;" href="{{url('exportpdf')}}">Pdf</a>
                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                                <th>ImgTitle</th>
                                <th>Imagename</th>
                                <th>Action</th>
                              {{-- <th>Action</th> --}}
                            </tr>
                          </thead>
                          <tbody>
                            {{-- @csrf @method('DELETE') --}}
                            {{-- <form id="delete-form-{{$user->id}}"
                                + action="{{route('users.destroy', $user->id)}}"
                                method="post">
                              @csrf @method('DELETE')
                          </form>--}}
                           {{-- @if(count($title)>0)

                            @foreach($title as $row)

                            <tr>
                            <td>{{$row->title}}</td>

                           </tr>

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
                     "url": "{{ url('admin/childimg/serverside/getdata') }}",
                     "dataType": "json",
                     "type": "POST",

                     "data":{ _token: "{{csrf_token()}}"}
                   },
        //   ajax: '{{url("admin/user/serverside")}}',

          columns: [
              { data: "id" },
              { data: "title" },
              { data: "imagename" },
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

@endsection

@endsection
