<!DOCTYPE html>

<html>

<head>

  <title>Laravel Ajax Multiple Image Upload with Preview Example</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>



  <style type="text/css">

    input[type=file]{

      display: inline;

    }

    #imgPreview{

      border: 1px solid black;

      padding: 10px;

    }

    #imgPreview img{

      width: 200px;

      padding: 5px;

    }

  </style>



</head>

<body>

<div class="container">

  <h1>Laravel Multiple Image Upload using Ajax with Preview Example</h1>

  <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">

      {{ csrf_field() }}

      <input type="file" id="uploadFile" name="image[]" multiple/>

      <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>

  </form>



  <br/>

  <div id="imgPreview"></div>

</div>



</body>



<script type="text/javascript">



  $("#uploadFile").change(function(){

     $('#imgPreview').html("");

     var total_file=document.getElementById("uploadFile").files.length;

     for(var i=0;i<total_file;i++)

     {

      $('#imgPreview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");

     }

  });



  $('form').ajaxForm(function()

   {

    alert("Uploaded SuccessFully");

   });



</script>

</html>
