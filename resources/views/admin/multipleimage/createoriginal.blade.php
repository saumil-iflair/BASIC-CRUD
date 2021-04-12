@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('MultipleImage Create Form') }}</div>
                <form class="form-horizontal" action="{{URL('admin/multipleimage')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
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
                      <label class="control-label col-sm-2" for="name"> MutipleImage:</label>
                      <div class="col-sm-10">
                            <input type="file"  multiple="true" class="form-control" name="image[]"   required>
                      {{-- {!! Form::file('multipleimage[]', $value=null, ['class'=>'form-control']) !!} --}}
                    @if ($errors->has('image'))
                    <span class="invalid feedback"role="alert">
                        <strong style="color: red;">{{ $errors->first('image') }}.</strong>
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
@endsection
