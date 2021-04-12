@extends('adminlte::page')

@section('content')

<div class="container">
<style>
    .error{
        color: red;
    }
</style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Rolemanagement Form') }}</div>
                {{-- <form class="form-horizontal" action="{{URL('admin/rolemanagement')}}" id="form2" method="POST" data-parsley-validate> --}}
                    {!! Form ::open(['action'=>['admin\RoleController@create'],'method'=>'post','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!}

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
                      <label class="control-label col-sm-2" for="name">Role:</label>
                      <div class="col-sm-10">
                      {!! Form::text('role', $value=null, ['class'=>'form-control','placeholder'=>'Role']) !!}
                      <span class="error">*</span>
                      @if ($errors->has('role'))
                    <span class="text-danger">{{ $errors->first('role') }}</span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-sm-2" for="status">Status:</label>
                      <div class="col-sm-10">
                        {{-- {!! Form::select('status','s',['class' => 'form-control'] ) !!} --}}
                        {!! Form::select('status', ['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE'], null, ['placeholder' => 'Select field...','class'=>'form-control']); !!}
                        {{-- {!! Form::select('status', array('id' => 'status','active' => 'active', 'inactive' => 'inactive'), 's'); !!} --}}
                      {{-- {!! Form::text('status', $value=null, ['class'=>'form-control','placeholder'=>'status']) !!} --}}
                      <span class="error">*</span>
                      @if ($errors->has('status'))
                      <span class="text-danger">{{ $errors->first('status') }}</span>
                      @endif
                      <!-- <input type="text" class="form-control" name="email" id="email"  required> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>


            </div>
        </div>
    </div>
</div>

@endsection
@section('adminlte_js')

<script>

    if ($("#form2").length > 0) {

     $("#form2").validate({


     rules: {

       role: {

         required: true,

         maxlength: 10

       },


         status: {

                 required: true,

             },

     },

     messages: {



       role: {

         required: "Please enter valid role",

         maxlength: "Your role name maxlength should be 10 characters long."

       },



       status: {

        //    required: "Please enter valid status",

        // required: true,

        //    maxlength: "The status name should less than or equal to 10 characters",

         },



     },


   })

 }

 </script>
@endsection

