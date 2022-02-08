<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Roles::all();
        return view('roles.role_index',compact('roles'));
    }

    public function store(Request $request){
        request()->validate([
            'rolename' => 'required'
        ]);
        $role = new Roles();
        $role->name = $request->rolename;
        $role->save();
        return redirect('/roles')->with('message','New role have been submited!');
    }

    public function edit(Roles $role){
        return view('roles.role_edit',compact('role'));
    }

    public function update(Request $request, Roles $role){
        request()->validate([
            'rolename' => 'required'
        ]);
        $role->name = $request->rolename;
        $role->save();
        return redirect('/roles')->with('message','Information have been updated!');
    }

    public function search(Request $request)
    {   
        $query = $request->input('query');
        if($query != ''){
            $roles = Roles::where('name','like',"%$query%")
            ->paginate(3);
        }
        else{
            $roles = Roles::orderBy('id','desc')->get();
        }
        return view('roles.role_index',compact('roles'));
    }
}
