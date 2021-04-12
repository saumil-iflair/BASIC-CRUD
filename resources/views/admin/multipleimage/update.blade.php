@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('User Update Form') }}</div>
                {!! Form::open(['action'=>['admin\MultipleImageController@update',$imagemodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!}
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
                        {!! Form::file('image', ['class'=>'form-control','required']) !!}
                        <?php
                        if(!empty($imagemodel->image))
                        {
                          ?>
                          <img src="<?php echo url('/')?>/uploads/{{$imagemodel->image}}" style="height:500px;width:500px"/>

                          <img src="<?php echo url('/')?>/uploads/{{$imagemodel->image}}" style="height:50px;width:50px;margin:-370px -19px 304px 605px;"/>

                        <?php
                        }
                        ?>

                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>


                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Update </button>
                      </div>
                    </div>
                  </form>


            </div>
        </div>
    </div>
</div>
@endsection
