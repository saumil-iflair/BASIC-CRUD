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
                <div class="card-header">{{ ('Registration Form') }}</div>
               <!--  <form class="form-horizontal" action="{{URL('admin/registration/create')}}" id="form2" method="POST" data-parsley-validate>
 -->
                  {!! Form ::open(['action'=>['admin\RegisterController@store'],'method'=>'post','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!}

                 <!--    {!! Form ::open(['action'=>['admin\RegisterController@store'],'method'=>'post','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!} -->

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
                      {!! Form::text('name', $value=null, ['class'=>'form-control','placeholder'=>'Name']) !!}
                      <span class="error">*</span>
                      @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Email:</label>
                      <div class="col-sm-10">
                      {!! Form::text('email', $value=null, ['class'=>'form-control','placeholder'=>'Email']) !!}
                      <span class="error">*</span>
                      @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Mobile Number:</label>
                      <div class="col-sm-10">
                      {!! Form::text('phone', $value=null, ['class'=>'form-control','placeholder'=>'Phone']) !!}
                      <span class="error">*</span>
                      @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Address:</label>
                      <div class="col-sm-10">
                      {!! Form::text('address', $value=null, ['class'=>'form-control','placeholder'=>'Address']) !!}
                      <span class="error">*</span>
                      @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
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

      name: {

         required: true,

         maxlength: 10

       },

      email: {

       required: true,

       // maxlength: 10

     },
      phone: {

         required: true,

         maxlength: 10

       },
        address: {

         required: true,

         // maxlength: 10

       },

     },

     messages: {



       name: {

         required: "Please enter valid Name",

         maxlength: "Your role name maxlength should be 10 characters long."

       },
         email: {

         required: "Please enter valid Email",

         maxlength: "Your role name maxlength should be 10 characters long."

       },
         phone: {

         required: "Please enter valid Phone Number",

         maxlength: "Your role name maxlength should be 10 characters long."

       },
         address: {

         required: "Please enter valid Address",

         // maxlength: "Your role name maxlength should be 10 characters long."

       },

     },


   })

 }

 </script>
@endsection

