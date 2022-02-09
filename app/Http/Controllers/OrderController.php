<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Orders;
use App\Models\Tables;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $dishes = Dishes::orderBy('id','desc')->get();
        $tables = Tables::all();
        return view('orders.order_index',compact('dishes','tables'));
    }

    public function submit(Request $request){
        $data = array_filter($request->except('_token','table'));
        foreach($data as $key=>$value){
        $order = new Orders();
        $order->table_id = $request->table;
        $order->dish_id = $key;
        $order->qty = $value;
        $order->status = config('res.orderstatus.new');
        $order->save();
        }
        return redirect('/')->with('message','New order have been submitted!');
    }
    
    public function order(){
        $rawstatus = config('res.orderstatus');
        $status = array_flip($rawstatus);
        $orders = Orders::whereIn('status',[1,2])->get();
        return view('orders.order_kitchen',compact('orders','status'));
    }

    public function approve(Orders $order){
        $order->status = config('res.orderstatus.processing');
        $order->save();
        return redirect('/kitchen')->with('message','Order have been approved!');
    }
    
    public function cancel(Orders $order){
        $order->status = config('res.orderstatus.cancel');
        $order->save();
        return redirect('/kitchen')->with('message','Order have been cancel!');
    }

    public function done(Orders $order){
        $order->status = config('res.orderstatus.ready');
        $order->save();
        return redirect('/kitchen')->with('message','Order is ready!');
    }
}
