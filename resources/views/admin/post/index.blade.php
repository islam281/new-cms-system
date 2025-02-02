



<x-admin-master>


@section('content')
@if (session('message'))

{{    session('message')      }}    
@endif

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>owner</th>
              <th>title</th>
              <th>image</th>
              <th>created at</th>
              <th>updated at</th>
              <th>delete</th>
             
            </tr>
          </thead>
          <tfoot>
            <tr>
                <th>id</th>
                <th>owner</th>
                <th>title</th>
                <th>image</th>
                <th>created at</th>
                <th>updated at</th>
                <th>delete</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach ($posts as $post)
                
           
            <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->user->name}}</td>
              <td> <a href="{{route('post.edit',$post->id)}}"> {{$post->title}}</a> </td>
              <td> <img height="80px" src="{{ $post->post_image }}" alt="">   </td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
              <td>               
              
              
              @can('delete', $post)
                  
           
              
                <form method="post" action="{{ route("post.destroy",$post->id) }}">

@csrf
@method('delete')


<input type="submit" name='delete' value="delete">

                </form>
                @endcan
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