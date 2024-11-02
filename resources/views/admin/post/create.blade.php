<x-admin-master>

    @section('content')
    <h1>create</h1>

  <form method='post' enctype="multipart/form-data"  action="{{route('post.store')}}" > 

   {{csrf_field()}}

<div class="form-group">

    <label for="title">title</label>

    <input type="text" name="title" class="form-control" placeholder="enter title"></div>

    <div class="form-group">

        <label for="post-image">post image</label>
    
        <input type="file" name="post_image" id="post_image" class="form-control-file" placeholder=""></div>
    

<div class="form-group"> 
    
    <label for="title">body</label>
    <textarea name="body" id="body" class="form-control" cols="30" rows="10"></textarea>   </div>



<div><input type="submit" class="" name="submit"> </div>

    @endsection
</x-admin-master>