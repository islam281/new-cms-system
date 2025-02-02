

<x-admin-master>


    @section('content')

    @if (session('message'))
    <div class="alert alert-danger">{{session('message')}}</div>  
    @endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="userTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                    <th>id</th>
                    <th>avatar</th>
                    <th>username</th>
                    <th>  name  </th>
                    <th>email</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>delete</th>
            </tr>
            </thead>



                <tfoot>
            <tr>
                <th>id</th>
                <th>avatar</th>
                <th>username</th>
                <th>name</th>
                <th>email</th>
                <th>created at</th>
                <th>updated at</th>
                <th>delete</th>
            </tr>
                </tfoot>





            <tbody>

          
        @foreach ($users as $user)
    
        <tr>
                <td>{{$user->id}}</td>
                <td> <img height="60px" src=" {{$user->avatar}}" alt=""> </td>
                <td>{{$user->username}}</td>
                <td><a href="{{route('user.profile.show',$user->id)}}">{{$user->name}}</a> </td>
                <td>{{$user->email}}</td> 
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    <form method="POST" action="{{route('user.destroy',$user->id)}}">
                        @csrf
                        @method('delete')


                        <input class="btn btn-danger" type="submit" value="delete">


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
<!-- /.container-fluid -->
{{-- {{$posts->links();}} --}}
</div>
<!-- End of Main Content -->



    
@endsection


@section('scripts')
   <!-- Page level plugins -->
   <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
 
   <!-- Page level custom scripts -->
 <script src="{{asset('js/demo/datatables-demo.js')}}"></script> 


@endsection




</x-admin-master>