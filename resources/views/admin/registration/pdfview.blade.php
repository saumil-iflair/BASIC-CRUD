<div class="container">
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
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                               
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($register as $data)

                            <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                             <td>{{$data->address}}</td>
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