<x-admin-master>

    @section('content')

    <div class="row">
        <div class="col-sm-3">

            <form action="{{route('permission.update',$permission->id)}}" method="post">

                @csrf
                @method('PATCH')

                <div class="form-group">
                    
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{$permission->name}}">

                </div>




                <div class="form-group">
                    
                    <button type="submit" class="btn btn-primary" >Update</button>

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
                                        
                                        <th>option</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                       
                           
                                      
                                    
                                    </tr>
                                </thead>
                                
                                <tfoot>
                                    <tr>
                                        <th>option</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        
                               
                                </tfoot>
    
                                <tbody>
    
    
                                    @foreach ($roles as $role)
                                        <tr>
    
                                            
        
                                                <td><input type="checkbox"
                                                    @foreach ($role->permissions as $role_permission)
                                                  

                                                  @if ( $role_permission->slug == $permission->slug)
                                                      checked
                                                  @endif
                                                   



                                                    @endforeach
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    ></td>
                                                <td>{{$role->id}}</td>
    
                                                <td>{{$role->name}}</td>
    
                                                <td>{{$role->slug}}</td>

                                                
    
                                              
    

                                           
    
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