@extends('adminlte::page')

@section('content')
<style>
    .error{
        color:red;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Roles Permission Form') }}</div>
                {!! Form ::open(['action'=>['admin\RolesController@store'],'method'=>'post','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!}
                {{-- {!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}} --}}
                {{-- <form class="form-horizontal" action="{{URL('admin/childimg')}}" method="POST" data-parsley-validate enctype= multipart/form-data> --}}
                    {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                          @endforeach
                        </ul>
                      </div>
                    @endif --}}

                  @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                              {{-- <input type="text"  class="form-control" name="title"   required> --}}
                              {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        @if ($errors->has('name'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('name') }}.</strong>
                      </span>
                      @endif
                        </div>
                      </div>



                    <div class="form-group">
                    <label class="control-label col-sm-2" for="name"> Permission:</label>
                    <div class="col-sm-10">

                    @foreach($permission as $value)
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                    {{ $value->name }}</label>
                    <br/>
                    @endforeach




                      @if ($errors->has('permission'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('permission') }}.</strong>
                      </span>
                      @endif
                        <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                        </div>
                      </div>



                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Add Image</button>
                      </div>
                    </div>
                  </form>


            </div>
        </div>
    </div>
</div>
{{--

      @if(Session::has('record'))
        <script>
            alert('testing');
            toastr.success("{!!Session::get('record')!!}");
        </script>
        @endif --}}
@endsection
@section('adminlte_js')
<script>


    //toastr.success("{!!Session::get('record_added')!!}");

    // alert('hi');
    // @if(Session::has('notification'))
    //   var type = "{{ Session::get('notification')['message'] }}";
    //   switch(type){
    //       case 'toast-info':
    //       toastr.info("{{ Session::get('notification') }}");
    //           break;

    //       case 'warning':
    //           toastr.warning("{{ Session::get('notification') }}");
    //           break;

    //       case 'success':
    //           toastr.success("{{ Session::get('notification') }}");
    //           break;

    //       case 'error':
    //           toastr.error("{{ Session::get('notification') }}");
    //           break;
    //   }
    // @endif
</script>
@section('adminlte_js')
<script>

    if ($("#form2").length > 0) {

     $("#form2").validate({


     rules: {

       title: {

         required: true,

         maxlength: 10

       },


       imagename: {

            required: true,

            // maxlength: 10

             },

     },

     messages: {



       title: {

         required: "Please enter your field",

         maxlength: "Your name maxlength should be 10 characters long."

       },
     },


   })

 }

 </script>
@endsection
