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
                <div class="card-header">{{ ('Admin Password') }}</div>
                <form class="form-horizontal" action="{{URL('admin/password')}}" id="form2" method="POST" data-parsley-validate>
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
                      <label class="control-label col-sm-2" for="oldpassword">Old Password:</label>
                      <div class="col-sm-10">
                        {{ Form::password('oldpassword', array('id' => 'oldpassword', "class" => "form-control")) }}
                        <span class="error">*</span>
                        {{-- {!! Form::password('oldpassword', $value=null, ['class'=>'form-control','placeholder'=>'Old Password']) !!} --}}
                    @if ($errors->has('oldpassword'))
                    <span class="invalid feedback"role="alert">
                        <strong style="color: red;">{{ $errors->first('oldpassword') }}.</strong>
                    </span>
                    @endif
                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="newpassword">New Password:</label>
                        <div class="col-sm-10">
                            {{ Form::password('newpassword', array('id' => 'newpassword', "class" => "form-control")) }}
                            <span class="error">*</span>
                        {{-- {!! Form::password('newpassword', $value=null, ['class'=>'form-control','placeholder'=>'New Password']) !!} --}}
                      @if ($errors->has('newpassword'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('newpassword') }}.</strong>
                      </span>
                      @endif
                        <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-sm-2" for="confirmpassword">ConFirm Password:</label>
                        <div class="col-sm-10">
                            {{ Form::password('confirmpassword', array('id' => 'confirmpassword', "class" => "form-control")) }}
                            <span class="error">*</span>
                        {{-- {!! Form::password('confirmpassword', $value=null, ['class'=>'form-control','placeholder'=>'Confirm Password']) !!} --}}
                    @if ($errors->has('confirmpassword'))
                    <span class="invalid feedback"role="alert">
                        <strong style="color: red;">{{ $errors->first('confirmpassword') }}.</strong>
                    </span>
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

        oldpassword: {

         required: true,

         maxlength: 10

       },


       newpassword: {

            required: true,

            maxlength: 10

             },

        confirmpassword: {

        required: true,

        maxlength: 10

        },

     },

     messages: {



        oldpassword: {

         required: "Please enter your Oldpassword",

         maxlength: "Your Oldpassword maxlength should be 10 characters long."

       },

       newpassword: {

        required: "Please enter your newpassword",

        maxlength: "Your newpassword maxlength should be 10 characters long."

        },

        confirmpassword: {

        required: "Please enter your confirmpassword",

         maxlength: "Your confirmpassword maxlength should be 10 characters long."

        },


     },


   })

 }

 </script>
@endsection

