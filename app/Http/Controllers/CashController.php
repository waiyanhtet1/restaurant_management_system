<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Tables;
use Illuminate\Http\Request;
use League\CommonMark\Extension\Table\Table;

class CashController extends Controller
{
    public function cashorder()
    {
        $rawstatus = config('res.orderstatus');
        $status = array_flip($rawstatus);
        $orders = Orders::all();
        return view('manager.cashorder', compact('orders', 'status'));
    }

    public function index()
    {
        $tables = Tables::all();
        return view('manager.cashing', compact('tables'));
    }

    public function detail(Tables $table)
    {
        $rawstatus = config('res.orderstatus');
        $status = array_flip($rawstatus);

        $orders = Orders::whereIn('table_id', $table)
        ->whereIn('status', [4,5])
        ->get();
        $amounts = [];
        return view('manager.cashing_list', compact('orders', 'table', 'status', 'amounts'));
    }

    public function checkout(Tables $table)
    {
        $orders = Orders::whereIn('table_id', $table)
        ->whereIn('status', [5])
        ->get();
        foreach ($orders as $order) {
            $order->status = config('res.orderstatus.paid');
            $order->save();
        }
        return redirect('/cashing')->with('message', 'Orders have been checked out!');
    }

    public function print(Tables $table)
    {
        $orders = Orders::whereIn('table_id',$table)
        ->whereIn('status',[5])
        ->get();
        $amounts = [];
        return view('manager.cash_invoice_print',compact('orders','amounts','table'));
    }
}