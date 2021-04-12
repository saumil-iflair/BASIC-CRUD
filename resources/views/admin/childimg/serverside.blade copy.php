@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Multiple images') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>Multiple Images</h2>

                        <table class="table table-striped" style="margin: -286px 12px -12px -7px;">
                          <thead>
                            <tr>
                                <th>Id</th>
                                <th>ImgId</th>
                                <th>Imagename</th>

                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                                @if(count($imgpass)>0)

                                @foreach ($imgpass as $row)
                                <div class="card mb-4 box-shadow">

                                <tr>
                                    <td>{{$row->id}}</td>
                                    <td>{{$row->imgid}}</td>
                                <td>
                                    <img class="card-img-top" style="width:68px" src="<?php ('storage/uploads/'.$row->imagename)?>" alt=""> <img src="{{asset('storage/uploads/' . $row->imagename)}}" style="height:100px;width:300px"/>
                                </td>

                                <td>
                                <div class="btn-group">
                                    <form action="{{route('deletepost.destroy', $row->id)}}" method='put'>
                                        @method('DELETE')
                                        @csrf

                                    </form>

                                <button type="button" class="btn btn-sm btn-round- btn-danger">Delete</button>
                                <button type="button" class="btn btn-sm btn-round- btn-info">Edit</button>
                                   </form>

                                </td>
                                </tr>


                                @endforeach

                                @endif
                          </tbody>
                        </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
