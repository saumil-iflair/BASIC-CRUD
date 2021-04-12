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
                <div class="card-header">{{ ('User Update Form') }}</div>
                {!! Form::open(['action'=>['admin\UserController@update',$user->id],'method'=>'put','class'=>'form-horizontal','id'=>'form2','enctype' =>'multipart/form-data']) !!}

                {{-- @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                          @endforeach
                        </ul>
                      </div>
                    @endif --}}

                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Name:</label>
                      <div class="col-sm-10">
                      {!! Form::text('name', $user->name, ['class'=>'form-control','placeholder'=>'Name']) !!}

                      @if ($errors->has('name'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('name') }}.</strong>
                      </span>
                      @endif

                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-10">
                      {!! Form::text('email', $user->email, ['class'=>'form-control','placeholder'=>'Email']) !!}
                      @if ($errors->has('email'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('email') }}.</strong>
                      </span>
                      @endif

                      <!-- <input type="text" class="form-control" name="email" id="email"  required> -->
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-sm-2" for="password">Password:</label>
                      <div class="col-sm-10">

                        {{ Form::text('password',$user->pwd, array('id' => 'password', "class" => "form-control")) }}

                      {{-- {!! Form::password('pwd', $usermodel->pwd, ['class'=>'form-control','required','placeholder'=>'Password']) !!} --}}
                      @if ($errors->has('password'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('password') }}.</strong>
                      </span>
                      @endif
                      <!-- <input type="password" class="form-control" name="password" id="password" data-parsley-type="alphanum" required> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-sm-2" for="confirmpassword">Confirm Password:</label>
                      <div class="col-sm-10">
                        {{ Form::text('confirmpassword',$user->confpwd, array('id' => 'pwd', "class" => "form-control")) }}

                      {{-- {!! Form::text('confpwd', $usermodel->confpwd, ['class'=>'form-control','required','placeholder'=>'Confirmpassword']) !!} --}}
                      @if ($errors->has('confirmpassword'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('confirmpassword') }}.</strong>
                      </span>
                      @endif
                      <!-- <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" data-parsley-type="alphanum" required> -->
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}

                        </div>
                      </div>


                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Update Student</button>
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


