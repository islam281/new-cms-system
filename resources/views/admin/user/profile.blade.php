<x-admin-master>


@section('content')


    
<h1>user profile for : {{$user->name }} </h1>

<div class="row">

<div class="col-sm-6">

    <form action="{{route('user.profile.update',$user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        

        <div class="form-group">
            <label for="name">profile picture</label>
         <div class="mb-4"><img height="90px" class="img-profile rounded-circle" src="{{$user->avatar }}"></div>   
            <input type="file" name="avatar" id="avatar" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="name">username</label>
            <input type="text" name="username" id="username" class="form-control @error('username')  is-invalid     @enderror" value="{{$user->username}}">

            @error('username')

            <div >{{$message}}</div>
                
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name')   is-invalid    @enderror" value="{{$user->name}}">
        </div>
        @error('name')

        <div >{{$message}}</div>
            
        @enderror

        <div class="form-group">
            <label for="name">E-mail</label>
            <input type="text" name="email" id="email" class="form-control @error('email')   is-invalid    @enderror" value="{{$user->email}}">
        </div>

        @error('email')

        <div >{{$message}}</div>
            
        @enderror

        <div class="form-group">
            <label for="name">password</label>
            <input type="password" name="password" id="password" class="form-control" >
        </div>
   


        <div class="form-group">
            <label for="name">password-confirm</label>
            <input type="password" name="password_confirm" id="password-confirm" class="form-control" >
        </div>




        <div class="col-sm-12">
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
                    <th>select</th>
                    <th>id</th>
                    <th>name</th>
                    <th>slug</th>
                    <th>attach</th>
                    <th>detach</th>
                 
            </tr>
            </thead>



                <tfoot>
            <tr>
                <th>select</th>
                <th>id</th>
                <th>name</th>
                <th>slug</th>
                <th>attach</th>
                <th>detach</th>
            </tr>
                </tfoot>





            <tbody>

                @foreach ($roles as $role)
    
                <tr>


                    
                        <td><input type="checkbox" name="select" id="" 
                            
                            @foreach ($user->roles as $user_role)
                                
                                @if ($user_role->name == $role->name)
                                checked
                                    
                                @endif



                            @endforeach
                            
                            
                            
                            ></td>

                        <td>{{$role->id}}</td>
                        
                        <td>{{$role->name}}</td>
                        
                        <td>{{$role->slug}}</td> 
                        <td>
                            
                             <form method="POST" action="{{route('user.role.attach',$user)}}">
                                @csrf
                                @method('put')
                            <input type="hidden" name="role" value="{{$role->id}}">
                            <button class="btn btn-primary"
                            
                            @if ($user->roles->contains($role))
                            disabled
                                
                            @endif
                            
                            
                            
                            >attach</button>
                        </form>
                         
                        </td> 

                        <td> <form method="POST" action="{{route('user.role.detach',$user)}}">
                            @csrf
                            @method('put')
                        <input type="hidden" name="role" value="{{$role->id}}">
                        <button class="btn btn-danger"
                        
                        @if (!$user->roles->contains($role))
                            disabled
                        @endif
                        
                        
                        >detach</button>
                    </form></td> 
        
                    </tr>

                   
    
                    @endforeach
      
           
        
            </tbody>
        </table>
        </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->
{{-- {{$posts->links();}} --}}
</div>
<!-- End of Main Content -->









            </div>



        <div> <input type="submit" name="submit" value="update"></div>


    </form>



</div>

</div>

@endsection








</x-admin-master>