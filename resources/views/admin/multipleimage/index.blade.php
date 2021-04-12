@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ ('MultipleImage ') }}</div>

                <div class="card-body">
                    <div class="container">
                        <h2>User data</h2>

                        <table class="table table-striped">
                          <thead>
                            <tr>
                                <th>ID</th>

                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @if(count($imagepass)>0)

                            @foreach($imagepass as $row)

                            <tr>
                            <td>{{$row->id}}</td>
                            <td>
                                {{-- <img src="{{ URL::asset('storage/') }}/' + files[0] + '"\" height=\"100\""\" width=\"150\"" /> --}}
                                <?php
                                // $images=explode('',$row->image);
                                $array = explode(' ',$row->image);
                            //  print_r($array);
                                ?>
                                @foreach ($array as $file)
                                <img style="width:68px" src="{{asset('storage/'.$file)}}" alt="">

                                @endforeach

                                {{-- @foreach($images as $file)
                                {
                                <img style="width:68px" src="{{asset('storage/'.$file)}}" alt="">
                                }
                                @endforeach --}}
                                    {{-- @foreach ($imagepass as $row)

                                    @endforeach --}}
                            {{-- <img style="" src="{{asset('storage/'.$row->image[0])}}" alt="dynamic"> --}}

                                {{-- <a href="{{ asset('storage' . $row->image) }}">
                                <img src="{{asset('storage' . $row->image) }}"
                                style="height:100px;width:100px"/>
                                </a> --}}
                                {{-- <img src="{{ URL::asset('storage/') }}/' + files[0] + '"\" height=\"100\""\" width=\"150\"" />' --}}
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
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
