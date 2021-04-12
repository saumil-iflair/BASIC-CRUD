@extends('adminlte::page')

@section('content')
<style type="text/css">
.table .odd a.btn.btn-lg ,.table .even a.btn.btn-lg {
    align-items: center;
    display: flex !important;
}
.table th, .table td
{
  vertical-align: middle;
}
i.fa.fa-trash{
  font-size: 19px;
  margin: 0 -6px;
}
button{
  border: none ! important;
      background-color: transparent;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <span class="form-control col-sm-4">

                    @php
                    $locale = session()->get('locale');
                    @endphp
                    <div class="dropdown">
                    <a aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">
                    @switch($locale)
                    @case('en')
                    <span id="selected">English</span>
                    @break
                    @case('fr')
                    <span id="selected">French</span>
                    @break
                   @case('guj')
                    <span id="selected">Gujrati</span>
                    @endswitch
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{url('locale/en')}}">English</a></li>
                    <li><a href="{{url('locale/fr')}}">French</a></li>
                     <li><a href="{{url('locale/guj')}}">Gujrati</a></li>
                    </ul>
                    </div>
                </span>
                <div class="card-header">{{ ('Registration page') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>{{__('messege.registrataion')}}</h2>

                      <!--    <a class="btn btn-primary" style="position: absolute;margin: -60px 750px;" href="{{url('import')}}">Import</a> -->
                             </div>
                             <div>
                              <a class="btn btn-primary" style="position: absolute;margin: -60px 761px;background-color: #277d27;" href="{{url('registerimport')}}">Import</a>
                             </div>

                              <div class="col-sm-12 ">
                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 828px;" href="{{url('export')}}">Export</a>

                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;background-color: #d2891c;" href="{{url('exportpdf')}}">Pdf</a>
                               </div>
                              <div class="col-sm-12 ">
                             <!--   <a  class="btn btn-primary" style="position: absolute;margin: -60px 828px;" href="{{url('export')}}">Export</a>

                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;" href="{{url('exportpdf')}}">Pdf</a> -->
                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{__('messege.action')}}</th>
                                <th>{{__('messege.name')}}</th>
                                <th>{{__('messege.email')}}</th>
                                <th>{{__('messege.mobilenumber')}}</th>
                                <th>{{__('messege.address')}}</th>
                                 <!-- <th>Action</th> -->
                            </tr>
                          </thead>
                          <tbody>
                          </form>

                          </tbody>
                        </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@section('adminlte_js')
<!-- <script>
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
  </script> -->
<script type="text/javascript">
    $(document).ready(function() {

        var dataTable = $('#exa1').DataTable( {
            "pageLength" : 100,
            "processing": true,
            "serverSide": true,

            "ajax":{
                "url": '{{route("admin.registration.index")}}',
                "dataType": "json",
                "type": "POST",
                "data":{ '_token': "{{csrf_token()}}"}
             },
            "method":'post',
            "columns": [
                { "data": "id", "name":"id"},
                { "data": "id",
                    "render": function(id, type, row ){
                       return '<a class="btn btn-lg" data-placement="top" data-toggle="tooltip" data-original-title="Show" href="registration/'+id+'">' + '<i class="fa fa-eye" aria-hidden="true"></i>' + '</a><a class="btn btn-lg" data-placement="top" data-toggle="tooltip" data-original-title="Edit" href="registration/'+id+'/edit">' + '<i class="fa fa-edit" aria-hidden="true"></i>' + '</a><form style="padding: 0.5rem 1rem;" action="{{ url("admin/users") }}/'+id+'" method="POST" onsubmit="return confirm(\'Are you sure you want to delete?\')">{{ csrf_field() }}{{ method_field("DELETE") }}<button type="submit" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></button></form>';

                        // return '<a class="btn btn-lg" data-placement="top" data-toggle="tooltip" data-original-title="Show" href="registration/'+id+'/edit">'+'<i class="fa fa-eye" aria-hidden="true"></i>'+'</a><a>+&nbsp&nbsp'+'&nbsp&nbsp'+'<i class="fas fa-edit" href="registration/'+id+'/edit"></i>'+'&nbsp&nbsp'+'&nbsp&nbsp'+'<form action="{{ url("admin/registration") }}/'+id+'" method="POST" onsubmit="return confirm(\'Are you sure you want to delete?\')">{{ csrf_field() }}{{ method_field("DELETE") }}<button><i class="fa fa-trash" aria-hidden="true"></i></button></form>';
                    }
                    ,searchable: false, sortable: false
                },
                { "data": "name", "name":"name"},
                { "data": "email", "name":"email"},
                { "data": "phone", "name":"phone"},
                { "data": "address", "name":"address"},
                // { "data": "action", "name":"action"},
            ],
            "order": [ 0, 'desc' ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ]
        });
    });
    $('#exa1').on('search.dt', function() {
    var value = $('.dataTables_filter input').val();
    console.log(value);
    });
</script>

@endsection

@endsection
