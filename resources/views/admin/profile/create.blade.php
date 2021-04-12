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
                <div class="card-header">{{ ('Admin Profile') }}</div>
                <form method="POST" class="form-horizontal" action="{{ route('user.update') }}" id="form2" method="POST" data-parsley-validate>
                {{-- <form class="form-horizontal" action="{{URL('admin/password')}}" id="form3" method="POST" data-parsley-validate> --}}
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

                   {{-- FOR FLASH MSG USED --}}

                   {{-- @if(session('success'))
                   <div class="alert alert-success " role="alert">
                   {{session('success')}}
                   </div>
                   @endif --}}

               <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                <input id="name" value="{{$user['name']}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" value="{{$user['email']}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4" style="margin: 20px 480px;">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Details') }}
                    </button>
                </div>
            </div>



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

         maxlength: 20

       },


         email: {

                 required: true,

             },

     },

     messages: {



       name: {

         required: "Please enter Your name ",

         maxlength: "Your role name maxlength should be 20 characters long."

       },



       email: {

        required: "Please enter Your email ",

        // required: true,

        //    maxlength: "The status name should less than or equal to 10 characters",

         },

     },


   })

 }

 </script>
@endsection

