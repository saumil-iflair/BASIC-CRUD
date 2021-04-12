@extends('adminlte::page')

@section('content')

@can('role-create')
{{-- <a class="btn btn-success" href="{{ route('admin.roles.create') }}"> Create New Role</a> --}}
@endcan

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('Roles Permission') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>Roles Permission Data</h2>

                             <div>
                              <a class="btn btn-primary" style="position: absolute;margin: -60px 761px;background-color: #277d27;" href="{{url('registerimport')}}">Import</a>
                             </div>

                              <div class="col-sm-12 ">
                               <a  class="btn btn-primary" style="position: absolute;margin: -60px 828px;" href="{{url('exportrole')}}">Export</a>

                              <!--  <a  class="btn btn-primary" style="position: absolute;margin: -60px 900px;background-color: #d2891c;" href="{{url('exportpdf')}}">Pdf</a>
                               </div> -->

                        <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>
                              <th>Name</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>


                            @foreach ($roles as $role)
                            @php

                            @endphp

                            <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>

                            <td>

                            <a href="{{URL('admin\roles',$role->id)}}/edit" class="btn btn-primary">Edit</a>

                            {!! Form::open(['action'=>['admin\RolesController@destroy',$role->id],'method'=>'post']) !!}

                            {{ Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-cons m-b-10 bold'])}}
                            {!! Form::close() !!}

                            </td>
                            </tr>

                            @endforeach


                          </tbody>
                        </table>

                        {!! $roles->render() !!}

                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
