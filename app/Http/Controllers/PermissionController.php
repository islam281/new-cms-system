<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use \App\Models\Role;

use Illuminate\Http\Request;
use \App\Models\Permission;
class PermissionController extends Controller
{
    //
    public function index(){

        return view("admin.permissions.index",['permissions'=>Permission::all()]);
    }

    public function store(){
        request()->validate([
            'name'=>'required'
        ]);

        Permission::create([
            
            'name'=>Str::ucFirst(request('name')) ,
            'slug'=>Str::of(Str::lower(request('name')))->slug('-')
        
        
        ]);

        return back();

    }


    public function destroy(Permission $permission){

        $permission->delete();

        return back();


    }


    public function show(Permission $permission){

        return view('admin.permissions.update',['permission'=>$permission , 'roles'=>Role::all()]);


    }


    public function update(Permission $permission){

        $input=request()->validate(['name'=>'required']);
        $input['slug']=Str::of(Str::lower($input['name']))->slug('-');

        $permission->update($input);
        return back();
    }
}
