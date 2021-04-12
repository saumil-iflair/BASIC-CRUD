@extends('adminlte::page')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Laravel Register Import Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
           Laravel Register Import Form
        </div>
        <div class="card-body">
            <form action="{{ route('import') }}" method="POST" id="form2" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </form>
        </div>
    </div>
</div>
   
</body>
</html>

@endsection
@section('adminlte_js')

<script>

    if ($("#form2").length > 0) {

     $("#form2").validate({


     rules: {

      file: {

         required: true,
       },
     
     messages: {

       file: {

         required: "Please enter valid File",
       },
   })

 }
 </script>
@endsection

