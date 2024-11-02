<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    //

    public function show(\App\Models\Post $post){

        

        return view('blog-post',['post'=>$post]);
    }

    public function create(){

        return view('admin.post.create');
    }
    /*          $inputs=$request->validate([

                'title'=>'required|min:5|max:255',
                'post_image'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'body'=>'required' ,

            ]); 

            
            if($request->file('post_image')){
                
                $inputs['post_image']=$request->file('post_image')->store('public\images');
                
            }   
           */
    public function store(request $request){

    
        $inputs=$request->validate([

            'title'=>'required|min:5|max:255',
            'post_image'=>'required|image',
            'body'=>'required' ,

            ]); 
            
            
            if($request->file('post_image')){
                
            $inputs['post_image']=$request->file('post_image')->store('images');
            
                }   
                
            auth()->user()->posts()->create($inputs);

            $request->session()->flash('message','post was created ');
            
        return Redirect()->route('post.index');
    }



    public function index(){
       
        $posts=  Post::all();
        return view('admin.post.index',['posts'=>$posts]);
    }


    public function destroy(Post $post,request $request){

        $this->authorize('delete',$post);
        $post->delete();
        $request->Session()->flash('message','post was deleted');
        return back();

    }

    public function edit(Post $post){

            
        return view('admin.post.edit',['post'=>$post]);
    }


    public function update(Post $post,request $request){

        $inputs=$request->validate([
        'title' =>'required|min:5|max:255',
        'post_image'=>'image' ,
        'body'=>'required' 

        ]);


        if($request->file('post_image')){

            $inputs['post_image']=$request->file('post_image')->store('images');
            $post->post_image=$inputs['post_image'];
        }

         $post->title=$inputs['title'];
         $post->body=$inputs['body'];
        
          $this->authorize('update',$post);

         $post->save();

         $request->session()->flash('message','post was updated');

         return redirect()->route('post.index');

    }


}
