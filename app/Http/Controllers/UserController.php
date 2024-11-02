<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    //


    public function index(){


        $users=User::all();


        return view('admin.user.index',['users'=>$users]);
    }

    public function show(User $user){

return view('admin.user.profile',[
    
    'user'=>$user,
    'roles'=>Role::all()

]);
    }


    public function update (User $user,request $request){

        $inputs=$request->validate([
            
            'username'=>['required','string','min:8','max:255','alpha_dash'],
            'name'=>['required','string','min:8','max:255'],
            'email'=>['required','email','max:255'],
            'avatar'=>['file'],

        ]);

        if($request->file('avatar')){

            $inputs['avatar'] =$request->file('avatar')->store('images');

          
        }


        $user->update($inputs);

        return redirect()->route('users.index');

    }

    public function attach(User $user){

        $user->roles()->attach(request('role'));
        return back();

 
    }

    public function detach(User $user){

        $user->roles()->detach(request('role'));
        return back();

 
    }

    public function destroy(User $user){
        $user->delete();

        session()->flash('message','user was deleted');

        return redirect()->route('users.index');


    }
}
