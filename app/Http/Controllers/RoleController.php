<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \App\Models\Role;
use \App\Models\User;
use \App\Models\Permission;

class RoleController extends Controller
{
    
    public function index(){

        return view("admin.roles.index",[    
    'roles'=>Role::all() 
    
    ]);
    }


    public function store(){
         request()->validate([
                'name'=> ['required']
            ]);

          Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')


          ]);         

          return back();
}


public function destroy(Role $role){

$role->delete();

session()->flash('role_delete','delete'.$role->name);

return back();


}


public function show(Role $role){

  return view('admin.roles.update',['role'=>$role,'permissions'=>Permission::all()]);
}


public function update(Role $role){

  $input=request()->validate([
      'name'=>['required']

  ]);

$input['name']=Str::ucfirst($input['name']);
$input['slug']=Str::of(Str::lower($input['name']))->slug('-');

if($role->wasChanged()){

  
  session()->flash('role_updated','role is updated');
  


}else{


  session()->flash('role_updated','nothing change');


}

$role->update($input);

  //return redirect()->route('role.index');
  return back();
}



public function attach(Role $role){
    
  $role->permissions()->attach(request('permission'));

      return back();
}


public function detach(Role $role){
    
  $role->permissions()->detach(request('permission'));

      return back();
}
}