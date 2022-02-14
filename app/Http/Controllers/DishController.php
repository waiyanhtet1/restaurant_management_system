<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishCreateRequest;
use App\Models\Categories;
use App\Models\Dishes;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dishes::latest()->paginate(8);
        // dd($dishes->find(3)->category);
        return view('dish.dish_index',compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('dish.dish_create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DishCreateRequest $request)
    {
        $dish = new Dishes();
        $dish->name = $request->dishname;
        $dish->category_id = $request->dishcategory;

        $imageName = date('YmdHis') . "." . request()->dishimage->getClientOriginalExtension();
        request()->dishimage->move(public_path('images'), $imageName);

        $dish->image = $imageName;
        $dish->price = $request->dishprice;
        $dish->save();
        return redirect('/dishes')->with('message','New dish have been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dishes $dish)
    {
        $categories = Categories::all();
        return view('dish.dish_edit',compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dishes $dish)
    {
        request()->validate([
            'dishname'=>'required',
            'dishcategory'=>'required',
            'dishprice'=>'required',
        ]);
        $dish->name = $request->dishname;
        $dish->category_id = $request->dishcategory;

        if ($request->dishimage) {
            $imageName = date('YmdHis') . "." . request()->dishimage->getClientOriginalExtension();
            request()->dishimage->move(public_path('images'), $imageName);
            $dish->image = $imageName;
        }
        $dish->price = $request->dishprice;
        $dish->save();
        return redirect('/dishes')->with('message','Dishe have been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dishes $dish)
    {
        $dish->delete();
        return redirect('/dishes')->with('message',"Dish have been deleted successfully!");
    }

    public function search(Request $request)
    {   
        $query = $request->input('query');
        if($query != ''){
            $dishes = Dishes::where('name','like',"%$query%")
            ->orWhere('price','like',"%$query%")
            ->paginate(3);
        }
        else{
            $dishes = Dishes::orderBy('id','desc')->get();
        }
        return view('dish.dish_index',compact('dishes'));
    }

}
