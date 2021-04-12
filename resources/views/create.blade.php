<html lang="en">
<head>
  <title>Laravel Multiple File Upload Example</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
      @if (count($errors) > 0)
      <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

    <h3 class="jumbotron">Laravel Multiple File Upload</h3>
<form method="post" action="{{url('form')}}" enctype="multipart/form-data">
  {{csrf_field()}}


        <div class="form-group">
            <label class="control-label col-sm-2" for="name"> Image:</label>
            <div class="col-sm-10">
                  <input type="file"  multiple="true" class="form-control" name="filename"   required>
            {{-- {!! Form::file('multipleimage[]', $value=null, ['class'=>'form-control']) !!} --}}
          @if ($errors->has('filename'))
          <span class="invalid feedback"role="alert">
              <strong style="color: red;">{{ $errors->first('filename') }}.</strong>
          </span>
          @endif
            <!-- <input type="text" class="form-control" name="fname" id="fname" maxlength="10" required> -->
            </div>
          </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>

  </form>
  </div>


<script type="text/javascript">


    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>
</body>
</html>
