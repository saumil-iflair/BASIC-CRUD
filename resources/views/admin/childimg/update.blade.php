@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Multipleimg Update Form') }}</div>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Album example · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/album/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap core CSS -->

    <!-- Favicons -->

    <style>
        .error{
            color:red;
        }
    </style>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->

  </head>
  <body>
    <header>


</header>

<main role="main">

  {{-- <section class="jumbotron text-center">
    <div class="container">
      <h1>Multiple Images</h1>
    </div>
  </section> --}}

  <div class="container">
    <br/>
  </div>


  <div class="form-group">
    {!! Form::open(['action'=>['admin\ChildImgController@update',$imgmodel->id],'method'=>'put','class'=>'form-horizontal','enctype' =>'multipart/form-data']) !!}

    {{ csrf_field() }}
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Img title:</label>
        <div class="col-sm-12">

        <section class="jumbotron text-center" style="text-align-last: left;font-size: x-large;font-weight: bold;">
        {{$imgmodel->title}}
        </section>
        {{-- {!! Form::text('title', $imgmodel->title, ['class'=>'form-control']) !!} --}}
      @if ($errors->has('title'))
      <span class="invalid feedback"role="alert">
          <strong style="color: red;">{{ $errors->first('title') }}.</strong>
      </span>
      @endif
        </div>
      </div>

    <label class="control-label col-sm-2" for="name"> Image:</label>
    <div class="col-sm-10">
          {{-- <input type="file"  name="uploadFile[]" multiple/> --}}
          <input id="uploadFile" type="file" name="imagename[]" accept="image/*"  data-min-file-count="1" multiple>

          {{-- <input type="file"  id="uploadFile" multiple name='imagename[]' value="Upload Image"/> --}}
          {{-- <input type="file"  multiple="true" class="form-control" name="imagename[]"   required> --}}
    {{-- {!! Form::file('multipleimage[]', $value=null, ['class'=>'form-control']) !!} --}}
  @if ($errors->has('imagename'))
  <span class="invalid feedback"role="alert">
      <strong style="color: red;">{{ $errors->first('imagename') }}.</strong>
  </span>
  @endif
    <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
    </div>
  </div>






  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        @if(count($imgpass)>0)
            @foreach($imgpass as $row)
            <div>
                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
                <div id="image_preview" >
                <div class="card-body" id="imgcheck">
                <img src="{{ asset('storage/uploads/' . $row->imagename) }}" style="height:70px;width:70px"/>
                <i class="fa fa-times" aria-hidden="true" style="position: absolute;" type="button" id="destroy" data-id="{{$row->id}}" data-token="{{ csrf_token() }}"  aria-hidden="true"></i>

              </div>
            </div>
            </div>

            @endforeach

        @endif


      </div>
    </div>
  </div>

</main>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-success" value="Upload Image">Add Image</button>
    </div>
  </div>
  </form>


</html>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-image-upload/1.2.0/jQuery-image-upload.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).on('click', '#destroy', function() {
        if (!confirm("Do you really want to do this?")) {
            return true;

        }
        var el = $(this),id = $(this).data('id');
        var token = $(this).data("token");
        var element = $(this);
        $.ajax({
            url: "{{ url('admin/childimg/imgdelete/') }}/" + id,

            type: 'DELETE',
            data: {

                "id": id,
                "_token": token,
            },
            success: function(data) {
                element.parent().remove();
            }
        });


    });
</script>

<script type="text/javascript">

    $("#uploadFile").change(function(){
       $('#image_preview').html("");
       var total_file=document.getElementById("uploadFile").files.length;
       for(var i=0;i<total_file;i++)
       {
        $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'style='height:70px;margin:20px;width:70px;'>");

       }
    //    $('#imgcheck').remove();

    });
  </script>
@endsection


