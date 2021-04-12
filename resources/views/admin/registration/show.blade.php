@extends('adminlte::page')

@section('content')

  <div class="col-lg-12">
    
            <div class="card-body card-block">
                <!-- Default box -->
                <div class="box main-section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                              <!--   <div class="col-lg-2 col-md-3 col-xs-12">
                                    <img src="{{asset('storage/'.$user->profile_picture)}}" width="150">
                                </div> -->
                              <!--   <div class="col-lg-6 col-md-6 col-xs-12 align-middle middle-innertext">
                                    {{-- @if($user->is_approved == "Approved")
                                        <span class="font-weight-bold text-uppercase text-success">{{$user->is_approved}}</span>
                                    @else
                                        <span class="font-weight-bold text-uppercase text-danger">{{$user->is_approved}}</span>
                                    @endif --}}
                                </div> -->
                             
                            </div>
                        </div>
                        <div class="view-table-box">

                            <div class="border-bottom clearfix">
                                <div class="col-lg-4 col-xs-12 font-weight-bold">Name</div>
                                <div class="col-lg-8 col-xs-12">{{$user->name}}</div>
                            </div>
                            <div class="border-bottom clearfix">
                                <div class="col-lg-4 col-xs-12 font-weight-bold">Email</div>
                                <div class="col-lg-8 col-xs-12">{{$user->email}}</div>
                            </div>
                            <div class="border-bottom clearfix">
                                <div class="col-lg-4 col-xs-12 font-weight-bold">Mobile Number</div>
                                <div class="col-lg-8 col-xs-12">{{$user->phone}}</div>
                            </div>
                            <div class="border-bottom clearfix">
                                <div class="col-lg-4 col-xs-12 font-weight-bold">Address</div>
                                <div class="col-lg-8 col-xs-12">{{$user->address}}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
@endsection
@section('adminlte_js')

@endsection

