@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Rolemanagement Form') }}</div>
                {!! Form::open(['action'=>['admin\RoleController@update',$rolemodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!}

                {{-- <form role="form" action="{{ action('admin\RoleController@update', $rolemodel->id )}}" method="put" enctype="multipart/form-data"> --}}
                {{-- {!! Form::open(['action'=>[route('posts.edit',$rolemodel->id)],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!} --}}
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
                      <label class="control-label col-sm-2" for="role">Role:</label>
                      <div class="col-sm-10">
                      {!! Form::text('role', $rolemodel->role, ['class'=>'form-control','required','placeholder'=>'Role']) !!}

                      @if ($errors->has('role'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('role') }}.</strong>
                      </span>
                      @endif

                      <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
                      </div>
                    </div>



                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">status:</label>
                      <div class="col-sm-10">
                        {!!  Form::select('status',$rolemodelstatus, $rolemodel->status, ['class' => 'form-control' ]) !!}
                      {{-- {!! Form::text('status', $rolemodel->status, ['class'=>'form-control','required','placeholder'=>'Status']) !!} --}}
                      @if ($errors->has('status'))
                      <span class="invalid feedback"role="alert">
                          <strong style="color: red;">{{ $errors->first('status') }}.</strong>
                      </span>
                      @endif

                      <!-- <input type="text" class="form-control" name="email" id="email"  required> -->
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" value="submit" class="btn btn-success">Update RoleManagement</button>
                      </div>
                    </div>
                  </form>


            </div>
        </div>
    </div>
</div>
@endsection
