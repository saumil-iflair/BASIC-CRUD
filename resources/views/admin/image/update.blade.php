@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Image Update Form') }}</div>
                {!! Form::open(['action'=>['admin\MutlipleImageController@update',$imagemodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!}

                {{-- {!! Form::open(['action'=>['admin\UserController@update',$usermodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!} --}}
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
                      <label class="control-label col-sm-2" for="image">Image:</label>
                      <div class="col-sm-10">
                      {!! Form::file('multipleimage', ['class'=>'form-control','placeholder'=>'Name']) !!}
                        <?php

                        if(!empty($imagemodel->multipleimage))
                        {
                          ?>
                          <img src="<?php echo url('/')?>/uploads/{{$imagemodel->multipleimage}}" style="height:100px;width:100px"/>
                      <?php
                        }
                        ?>

                      @if ($errors->has('multipleimage'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('multipleimage') }}.</strong>
                      </span>
                      @endif

                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Update Image</button>
                      </div>
                    </div>
                  </form>



            </div>
        </div>
    </div>
</div>

@endsection
