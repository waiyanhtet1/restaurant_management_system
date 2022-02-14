<?php

namespace App\Http\Controllers;

use App\Models\Tables;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index(){
        $tables =Tables::latest()->paginate(8);
        return view('tables.table_index',compact('tables'));
    }

    public function create(){
        return view('tables.table_create');
    }

    public function store(Request $request){
        request()->validate([
            'number' => 'required',
        ]);
        $table = new Tables();
        $table->number = $request->tablename;

        if($request->tablelevel == "1"){
            $table->level_table = "Classic";
        } else if($request->tablelevel == "2"){
            $table->level_table = "Medium";
        } else if($request->tablelevel == "3"){
            $table->level_table = "VIP";
        }

        $table->save();
        return redirect('/tables')->with('message','New Table have been submitted!');
    }

    public function edit(Tables $table){
        if($table->level_table == "Classic"){
            $level = 1;
        } else if($table->level_table == "Medium"){
            $level = 2;
        } else if($table->level_table == "VIP"){
            $level = 3;
        }
        return view('tables.table_edit',compact('table','level'));
    }
    
    public function update(Request $request, Tables $table){
        request()->validate([
            'number' => 'required',
        ]);
        $table->number = $request->tablename;
        if($request->tablelevel == "1"){
            $table->level_table = "Classic";
        } else if($request->tablelevel == "2"){
            $table->level_table = "Medium";
        } else if($request->tablelevel == "3"){
            $table->level_table = "VIP";
        }
        $table->save();
        return redirect('/tables')->with('message','Information have been updated!');
    }
}
