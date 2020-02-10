<?php

namespace App\Http\Controllers;

use App\Orders_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=5;
        $orders=Orders_model::all();

        return view('backEnd.order.index',compact('menu_active','orders'));
    }
    public function edit($id)
    {
        $menu_active=5;
        $edit_order=Orders_model::findOrFail($id);
        return view('backEnd.order.edit',compact('menu_active','show_orders'));
    }
    public function destroy($id)
    {
        $delete_order=Orders_model::findOrFail($id);
        $delete_order->delete();
        return back()->with('message','Delete Order Already!');
    }
}
