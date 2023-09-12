<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('status', '0')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function view($id)
    {
        $orders= Order::where('id', $id)->first();
        return view('admin.order.view', compact('orders'));
    }

    public function update_order(Request $request, $id)
    {
        $orders= Order::find($id);
        $orders->status= $request->order_status;
        $orders->update();

        return redirect('/orders')->with('message', 'Order Updated Successfully');
    }

    public function order_history()
    {
        $orders= Order::where('status', '1')->get();
        return view('admin.order.history', compact('orders'));
    }

    public function pdf_download()
    {
        $orders=Order::where('status', '0')->get();
        $pdf = PDF::loadView('pdf.order', ['orders' => $orders]);
        return $pdf->download('order.pdf');
    }
}
