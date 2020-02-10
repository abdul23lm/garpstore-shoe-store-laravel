<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ListusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu_active=6;
        $users=User::all();
        return view('backEnd.user.index',compact('menu_active','users'));
    }
    public function edit($id)
    {
        $menu_active=6;
        $edit_users=User::findOrFail($id);
        return view('backEnd.user.show',compact('menu_active','show_users'));
    }
    public function destroy($id)
    {
        $delete_user=User::findOrFail($id);
        $delete_user->delete();
        return back()->with('message','Delete User Already!');
    }
}
