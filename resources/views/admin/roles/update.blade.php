<x-admin-master>


    @section('content')

    @if (Session::has('role_updated'))
        {{session('role_updated')}}
    @endif

        <div class="row">
            <div class="col-sm-6">

                <form action="{{route('role.update',$role->id)}}" method="post">

                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{$role->name}}">

                    </div>




                    <div class="form-group">
                        
                        <button type="submit" class="btn btn-primary" >Update</button>

                    </div>

                </form>










            </div>









        </div>


        <div class="row">



            
            <div class="col-lg-12">
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
                                        
                                        <th>options</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>delete</th>
                           
                                      
                                    
                                    </tr>
                                </thead>
                                
                                <tfoot>
                                    <tr>
                                        <th>options</th>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>slug</th>
                                        <th>delete</th>
                               
                                </tfoot>
    
                                <tbody>
    
    
                                    @foreach ($permissions as $permission)
                                        <tr>
    
                                            
        
    
                                                <td><input type="checkbox" 
                                                    
                                                    @foreach ($role->permissions as $role_permission)
                                                        @if ($role_permission->slug == $permission->slug)

                                                            checked
                                                            
                                                        @endif
                                                    @endforeach
                                                    
                                                    
                                                    
                                                    ></td>
                                                <td>{{$permission->id}}</td>
    
                                                <td>{{$permission->name}}</td>
    
                                                <td>{{$permission->slug}}</td>
    
                                                <td>
                                            
                                                    <form action="{{route('permissions.roles.attach',$role->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        
                                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                                        <input type="submit" value="attach" class="btn btn-primary"
                                                        
                                                        @if ($role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                        
                                                        
                                                        
                                                        >
                                                    </form>
    
                                                </td>
    

                                                <td>
                                            
                                                    <form action="{{route('permissions.roles.detach',$role->id)}}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        
                                                        <input type="hidden" name="permission" value="{{$permission->id}}">
                                                        <input type="submit" value="detach" class="btn btn-danger"
                                                        
                                                        @if (!$role->permissions->contains($permission))
                                                            disabled
                                                        @endif
                                                        
                                                        
                                                        
                                                        >
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