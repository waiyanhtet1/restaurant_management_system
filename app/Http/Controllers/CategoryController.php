<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Dishes;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::latest()->paginate(8);
        return view('categories.category_index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.category_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'categoryname'=>'required',
        ]);
        $category = new Categories();
        $category->name = $request->categoryname;
        $category->save();
        return redirect('/categories')->with('message','New category have been submitted successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view('categories.category_edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)
    {
        request()->validate([
            'categoryname' => 'required',
        ]);
        $category->name = $request->categoryname;
        $category->save();
        return redirect('/categories')->with('message','Category have been edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        //
    }

    public function search(Request $request)
    {   
        $query = $request->input('query');
        if($query != ''){
            $categories = Categories::where('name','like',"%$query%")
            ->paginate(3);
        }
        else{
            $categories = Categories::orderBy('id','desc')->get();
        }
        return view('categories.category_index',compact('categories'));
    }
}
