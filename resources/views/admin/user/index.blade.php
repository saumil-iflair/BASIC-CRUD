@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('User Data') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>User data</h2>

                            <div>
                              <a class="btn btn-primary" style="position: absolute;margin: -60px 761px;background-color: #277d27;" href="{{url('registerimport')}}">Import</a>
                             </div>

                              <div class="col-sm-12 ">
                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 828px;" href="{{url('export')}}">Export</a>

                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;background-color: #d2891c;" href="{{url('exportpdf')}}">Pdf</a>
                               </div>

                        <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              {{-- <th>Password</th>
                              <th>Confirm Password</th> --}}
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(count($userpass)>0)

                            @foreach($userpass as $row)

                            <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            {{-- <td>{{$row->pwd}}</td>
                            <td>{{$row->confpwd}}</td> --}}
                                <td>
                                @if(!empty($row->getRoleNames()))
                                @foreach($row->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                                @endif
                                </td>
                            <td>
                            <a href="{{URL('admin\user',$row->id)}}/edit" class="btn btn-primary">Edit</a>
                            {!! Form::open(['action'=>['admin\UserController@destroy',$row->id],'method'=>'post']) !!}

                            {{ Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-cons m-b-10 bold'])}}
                            {!! Form::close() !!}
                            </td>
                            </tr>

                            @endforeach

                        @endif
                          </tbody>
                        </table>
                        {{-- {!! $row->render() !!} --}}
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
