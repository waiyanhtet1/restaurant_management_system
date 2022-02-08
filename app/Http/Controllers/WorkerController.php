<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerCreateRequest;
use App\Models\Roles;
use App\Models\Workers;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){
        $workers = Workers::orderBy('id','desc')->get();
        return view('workers.worker_index',compact('workers'));
    }

    public function create(){
        $roles = Roles::all();
        return view('workers.worker_create',compact('roles'));
    }

    public function store(WorkerCreateRequest $request){
        // dd($request->workerimage);
        $worker = new Workers();
        $worker->name = $request->workername;
        $worker->gender = $request->workergender;
        $worker->role_id = $request->workerrole;
        $worker->content = $request->workercontent;
        $worker->phone = $request->workerphone;

        $imageName = date('YmdHis') . "." . request()->workerimage->getClientOriginalExtension();
        request()->workerimage->move(public_path('images'), $imageName);
        $worker->image = $imageName;
        
        $worker->save();
        return redirect('/workers')->with('message','New Worker have been submited!');
    }

    public function edit(Workers $worker){
        $roles = Roles::all();
        return view('workers.worker_edit',compact('worker','roles'));
    }

    public function update(Request $request,Workers $worker){
        request()->validate([
            'workername' => 'required|max:255',
            'workerrole' => 'required',
            'workergender' => 'required',
            'workercontent' => 'required',
            'workerphone' => 'required|max:9',
        ]);
        $worker->name = $request->workername;
        $worker->gender = $request->workergender;
        $worker->role_id = $request->workerrole;
        $worker->content = $request->workercontent;
        $worker->phone = $request->workerphone;
        if($request->workerimage){
            $imageName = date('YmdHis') . "." . request()->workerimage->getClientOriginalExtension();
        request()->workerimage->move(public_path('images'), $imageName);
        $worker->image = $imageName;
        
        $worker->save();
        }
        $worker->save();
        return redirect('/workers')->with('message','Information have been updated!');
    }

    public function destroy(Workers $worker){
        $worker->delete();
        return redirect('/workers')->with('message','Worker have been fired!');
    }

    public function search(Request $request)
    {   
        $query = $request->input('query');
        if($query != ''){
            $workers = Workers::where('name','like',"%$query%")
            ->orWhere('content','like',"%$query%")
            ->orWhere('phone','like',"%$query%")
            ->paginate(3);
        }
        else{
            $workers = Workers::orderBy('id','desc')->get();
        }
        return view('workers.worker_index',compact('workers'));
    }
}
