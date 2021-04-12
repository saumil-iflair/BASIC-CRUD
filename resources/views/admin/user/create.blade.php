@extends('adminlte::page')
{{-- <link rel="stylesheet" type="image/png" href="{{asset('images/vendor/M-favicon-01.png')}}"> --}}
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
                <div class="card-header">{{ ('User Create Form') }}</div>
                {!! Form ::open(['action'=>['admin\UserController@create'],'method'=>'post','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!}
                @csrf
                <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-12">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

                <span class="error">*</span>
                @if ($errors->has('name'))
              <span class="error">
                  <strong style="color: red;">{{ $errors->first('name') }}.</strong>
              </span>
              @endif

            </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-12">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

                <span class="error">*</span>
                @if ($errors->has('email'))
              <span class="error">
                  <strong style="color: red;">{{ $errors->first('email') }}.</strong>
              </span>
              @endif
            </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-12">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}


                <span class="error">*</span>
                @if ($errors->has('password'))
              <span class="error">
                  <strong style="color: red;">{{ $errors->first('password') }}.</strong>
              </span>
              @endif

            </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-12">
                <strong>Confirm Password:</strong>
                {!! Form::password('confirmpassword', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

                <span class="error">*</span>
                @if ($errors->has('confirmpassword'))
              <span class="error">
                  <strong style="color: red;">{{ $errors->first('confirmpassword') }}.</strong>
              </span>
              @endif
            </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="col-sm-12">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary" style="margin:15px;">Submit</button>
                </div>
                </div>
                {!! Form::close() !!}


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

             password: {

        required: true,

        maxlength: 10

        },

        confirmpassword: {

        required: true,

        maxlength: 10

        },

     },

     messages: {



       name: {

         required: "Please enter your name",

         maxlength: "Your name maxlength should be 10 characters long."

       },

        email: {

        required: "Please enter your email",

        // maxlength: "Your email ."

        },

        pwd: {

        required: "Please enter your email",

         maxlength: "Your password maxlength should be 10 characters long."

        },



        confpwd: {

            required: "Please enter your email",

            maxlength: "Your password maxlength should be 10 characters long."


         },



     },


   })

 }

 </script>
@endsection

