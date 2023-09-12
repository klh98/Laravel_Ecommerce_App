<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cart_items= Cart::where('user_id', Auth::id())->get();
        foreach($old_cart_items as $item)
        {
            if(!Product::where('id', $item->prod_id)->where('qty', '>=' ,$item->prod_qty)->exists())
            {
                $removeItem= Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cart_items= Cart::where('user_id', Auth::id())->get();
        return view('user.checkout', compact('cart_items'));
    }


    public function place_order(Request $request)
    {
        $order= new Order();
        $order->user_id= Auth::id();
        $order->fname= $request->fname;
        $order->lname= $request->lname;
        $order->email= $request->email;
        $order->phone= $request->phone;
        $order->address1= $request->address1;
        $order->address2= $request->address2;
        $order->city= $request->city;
        $order->state= $request->state;
        $order->country= $request->country;
        $order->pin_code= $request->pin_code;

        // $order->save();

        //To calculate the total price
        $total=0;
        $cart_items_total= Cart::where('user_id', Auth::id())->get();
        foreach($cart_items_total as $prod)
        {
            $total+= $prod->products->selling_price;
        }
        $order->total_price= $total;
        $order->tracking_no= 'technoland'.rand(1111,9999);
        $order->save();

        $data= array(
            'name' => $request->fname,
            'email' => $request->email,
            'address' => $request->address1,
            'city' => $request->city,
        );

        Mail::send('mail', $data, function($message){
            $message->to('aung@gmail.com', 'Dear Customer')->subject('Contact Us Mail');
            $message->from('minkogye@gmail.com', 'Admin');
        });

        //To create order items
        $cart_items= Cart::where('user_id', Auth::id())->get();
        foreach($cart_items as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);


            //To reduce quantity from product table
            $prod= Product::where('id', $item->prod_id)->first();
            $prod->qty= $prod->qty - $item->prod_qty;
            $prod->update();
        }

        //check user info
        if(Auth::user()->address1 == null)
        {
            $user= User::where('id', Auth::id())->first();
            $user->name= $request->fname;
            $user->lname= $request->lname;
            $user->phone= $request->phone;
            $user->address1= $request->address1;
            $user->address2= $request->address2;
            $user->city= $request->city;
            $user->state= $request->state;
            $user->country= $request->country;
            $user->pin_code= $request->pin_code;
            $user->update();
        }

        $cart_items= Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cart_items);

        return redirect('/')->with('status', 'Order Placed Successfully. Please Check Your Email');

    }

}
