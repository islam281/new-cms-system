<x-admin-master>

    @section('content')
        <div class="row">
       
            @if (Session::has('role_delete'))

            <div class="alert alert-danger"> {{session('role_delete')}}</div>   
                   
               @endif


        </div>
        <div class="row">


       

            <div class="col-sm-3">

            <form method="post" action="{{route('role.store')}}">

                @csrf
                <div class="form-group">

                    <label for="name">name</label>

                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">

                    @error('name')

                    <strong>{{$message}}</strong>
                        
                    @enderror


                    <input type="submit" value="create" class="btn btn-primary btn-block">


                </div>




            </form>




            </div>

            
            <div class="col-sm-9">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">roles</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>delete</th>
                       
                                  
                                
                                </tr>
                            </thead>
                            
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>slug</th>
                                    <th>delete</th>
                           
                            </tfoot>

                            <tbody>


                                @foreach ($roles as $role)
                                    <tr>

                                        
    

                                            <td>{{$role->id}}</td>

                                            <td><a href="{{route('role.show',$role->id)}}"> {{$role->name}}</a></td>

                                            <td>{{$role->slug}}</td>

                                            <td>
                                                <form action="{{route('role.destroy',$role->id)}}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger">delete</button>



                                                </form>



                                            </td>

                                         

                                    </tr>
                                @endforeach  
                    



            

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




        </div>








    @endsection







</x-admin-master>