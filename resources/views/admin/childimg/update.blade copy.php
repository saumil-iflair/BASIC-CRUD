@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Multipleimg Update Form') }}</div>
                {!! Form::open(['action'=>['admin\ChildImgController@update',$multipleimagemodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!}

                <html lang="en">
                    <head>
                      <title>Laravel Multiple File Upload Example</title>
                      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                    </head>
                    <body><br>
                    <div class="container">
                        @if (count($errors) > 0)
                          <div class="alert alert-danger">
                            <strong>Sorry !</strong> There were some problems with your input.<br><br>
                            <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </div>
                          @endif

                            @if(session('success'))
                            <div class="alert alert-success">
                              {{ session('success') }}
                            </div>
                            @endif

                    <h3 class="jumbotron">Multiple Images</h3>
                    <form method="post" action="{{url('upload_data')}}" enctype="multipart/form-data">
                      {{csrf_field()}}

                            <div class="clone hide">
                              <div class="control-group input-group" style="margin-top:10px">
                                {{-- <input type="file" name="filename[]" class="form-control"> --}}
                                <div class="input-group-btn">
                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                              </div>
                            </div>
                      </form>
                       <br><hr>

                       <h4><i class="glyphicon glyphicon-picture"></i> Display Data Image    </h4>
                       <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>

                            <th>Picture</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(count($imgpass)>0)

                                @foreach($imgpass as $row)

                                <tr>

                                <td>
                                <img src="{{ asset('storage/uploads/' . $row->imagename) }}" style="height:100px;width:300px"/>
                                </td>

                               <td>
                                <i class="fa fa-trash" type="button" id="destroy" data-id="{{$row->id}}" data-token="{{ csrf_token() }}"  aria-hidden="true"></i>
                                </td>
                                </tr>

                                @endforeach

                            @endif
                        </tbody>
                        <tbody>

                        </tbody>
                       </table>

                      </div>



                    </body>
                    </html>


            </div>
        </div>
    </div>



</div>
<script>

// $(document).on('click', '#destroy', function (e) {
//     e.preventDefault();
//     var id = $(this).data('id');
//     swal({
//             title: "Are you sure!",
//             type: "error",
//             confirmButtonClass: "btn-danger",
//             confirmButtonText: "Yes!",
//             showCancelButton: true,
//         },
//         function() {
//             $.ajax({
//                 url: "{{ url('admin/childimg/') }}/"+id,
//                 type: "DELETE",

//                 data: {id:id},
//                 success: function (data) {
//                               //

//                     }
//             });
//     });
// });

            $(document).on('click','#destroy', function(){
            if(!confirm("Do you really want to do this?")) {
            return true;

            }
            var id = $(this).data("id");
            //   alert(id);
            var token = $(this).data("token");

            $.ajax(
            {
                url: "{{ url('admin/childimg/') }}/"+id,

            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,

            },

            });

            });
</script>
@endsection


