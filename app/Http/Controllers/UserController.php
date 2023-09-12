<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $orders= Order::where('user_id', Auth::id())->get();
        return view('user.orders.index', compact('orders'));
    }

    public function view($id)
    {
        $orders= Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('user.orders.view', compact('orders'));
    }

    public function view_users()
    {
        $users= User::all();
        return view('admin.view_users', compact('users'));
    }
}
