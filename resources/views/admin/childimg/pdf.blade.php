@extends('adminlte::page')

@section('content')
<div class="container">
  <style type="text/css">
     @font-face {
            font-family: 'Jaldi';
            src: url({{storage_path('fonts/Jaldi/Jaldi-Bold.ttf')}}) format("truetype");
            font-weight: bold;
        }
  </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Image Intervention') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>Image Intervention Form</h2>
                             </div>
                              <div class="col-sm-12 ">
                              
                        <table id="exa1" class="table table-striped">
                          <thead>
                            <tr>
                              <!--   <th>ID</th> -->
                                <th>ImgTitle</th>
                               
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($img as $data)

                            <tr>
                            <td>{{$data->title}}</td>
                            <!-- <td>
                              <img src="{{storage_path('app/public/uploads/'.$data->Imagename)}}" width="100px" height="100px">
                            </td> -->

                            @endforeach
                           </tr>
                          </tbody>
                        </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@section('adminlte_js')


@endsection

@endsection
