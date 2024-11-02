<x-admin-master>



@section('content')

    <div class="row">
        <div class="col-sm-3">
            <form action="{{route('permission.store')}}" method="post" >

                @csrf
                <div class="form-group">

                    <label for="name"> Name</label>
                    <input type="text" class="form-control" name="name">

                </div>

       
            <input type="submit" value="create">
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
    
    
                                    @foreach ($permissions as $permission)
                                        <tr>
    
                                            
        
  
                                                <td>{{$permission->id}}</td>
    
                                                <td><a href="{{route('permission.show',$permission->id)}}">{{$permission->name}}</a></td>
    
                                                <td>{{$permission->slug}}</td>

                                                <td><form action="{{route('permission.destroy',$permission->id)}}" method="post">

                                                    @csrf

                                                    <input type="submit" class="btn btn-danger" value="delete">
                                                
                                                
                                                
                                                </form></td>
    
                                              
    

                                           
    
                                        </tr>
                                    @endforeach  
                        
    
    
    
                
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    
        </div>
        

    </div>



    
@endsection






</x-admin-master>